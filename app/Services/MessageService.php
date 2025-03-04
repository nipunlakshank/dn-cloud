<?php

namespace App\Services;

use App\Models\Chat;
use App\Models\Message;
use App\Models\MessageAttachment;
use App\Models\MessageReaction;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MessageService
{
    public function send(Chat $chat, User $user, string $text, array $attachments = [], ?int $repliedToId = null, bool $isReport = false): Message
    {
        return DB::transaction(function () use ($chat, $user, $text, $attachments, $repliedToId, $isReport) {
            $message = Message::create([
                'chat_id' => $chat->id,
                'user_id' => $user->id,
                'text' => $text,
                'replied_to' => $repliedToId,
                'is_report' => $isReport,
            ]);

            foreach ($attachments as $attachment) {
                $name = $attachment->getClientOriginalName() ?? null;
                $path = Storage::disk('public')->put('attachments', $attachment);
                $size = Storage::disk('public')->size($path);
                MessageAttachment::create([
                    'message_id' => $message->id,
                    'name' => $name,
                    'path' => $path,
                    'size' => $size,
                ]);
            }

            return $message;
        });
    }

    public function delete(Message $message): void
    {
        DB::transaction(function () use ($message) {
            $message->update(['is_deleted' => true]);
        });
    }

    public function reply(Message $replyTo, User $user, string $text, $attachments = [], bool $isReport = false): Message
    {
        return $this->send($replyTo->chat, $user, $text, $attachments, $replyTo->id, $isReport);
    }

    public function react(Message $message, User $user, string $reaction)
    {
        DB::transaction(function () use ($message, $user, $reaction) {
            if (!in_array($reaction, ['like', 'dislike', 'love', 'haha', 'wow', 'sad', 'angry'])) {
                throw new Exception('Invalid reaction type.');
            }

            return MessageReaction::updateOrCreate(
                ['message_id' => $message->id, 'user_id' => $user->id],
                ['reaction' => $reaction]
            );
        });
    }

    public function unreact(Message $message, User $user): void
    {
        DB::transaction(function () use ($message, $user) {
            MessageReaction::where('message_id', $message->id)->where('user_id', $user->id)->delete();
        });
    }

    public function markAsDelivered(Message $message, User $user): void
    {
        DB::transaction(function () use ($message, $user) {
            $status = $message->status()->where('user_id', $user->id)->first();
            if ($status && $status->pivot->delivered_at) {
                return;
            }
            $message->status()->updateExistingPivot($user->id, [
                'delivered_at' => now(),
            ]);
        });
    }

    public function markAsRead(Message $message, User $user): void
    {
        DB::transaction(function () use ($message, $user) {
            $message->status()
                ->wherePivot('user_id', $user->id)
                ->whereNull('read_at')
                ->updateExistingPivot($user->id, [
                    'read_at' => now(),
                ]);
        });
    }

    public function isDelivered(Message $message, ?User $user = null): bool
    {
        return $this->getState($message, $user) === 'delivered';
    }

    public function isRead(Message $message, ?User $user = null): bool
    {
        return $this->getState($message, $user) === 'read';
    }

    public function getState(Message $message, ?User $user = null): string
    {
        $user = $user ?? Auth::user();

        // Check if any status is not delivered
        $notDelivered = $message->status()
            ->where('user_id', '!=', $user->id)
            ->whereNull('delivered_at')
            ->exists();

        if ($notDelivered) {
            return 'sent';
        }

        // Check if any status is not read
        $notRead = $message->status()
            ->where('user_id', '!=', $user->id)
            ->whereNull('read_at')
            ->exists();

        return $notRead ? 'delivered' : 'read';
    }
}
