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
    public function send(Chat $chat, User $user, string $text, $attachments = [], $repliedToId = null)
    {
        return DB::transaction(function () use ($chat, $user, $text, $attachments, $repliedToId) {
            $message = Message::create([
                'chat_id' => $chat->id,
                'user_id' => $user->id,
                'text' => $text,
                'replied_to' => $repliedToId,
            ]);

            foreach ($attachments as $attachment) {
                $path = Storage::disk('public')->put('attachments', $attachment['path']);
                MessageAttachment::create([
                    'message_id' => $message->id,
                    'path' => $path,
                    'type' => $attachment['type'],
                ]);
            }

            return $message;
        });
    }

    public function delete(Message $message)
    {
        $message->update(['is_deleted' => true]);
    }

    public function reply(Message $originalMessage, User $user, string $text, string $type, $attachments = [])
    {
        return $this->send($originalMessage->chat, $user, $text, $type, $attachments, $originalMessage->id);
    }

    public function react(Message $message, User $user, string $reaction)
    {
        if (!in_array($reaction, ['like', 'dislike', 'love', 'haha', 'wow', 'sad', 'angry'])) {
            throw new Exception('Invalid reaction type.');
        }

        return MessageReaction::updateOrCreate(
            ['message_id' => $message->id, 'user_id' => $user->id],
            ['reaction' => $reaction]
        );
    }

    public function unreact(Message $message, User $user)
    {
        return MessageReaction::where('message_id', $message->id)->where('user_id', $user->id)->delete();
    }

    public function markAsDelivered(Message $message, User $user): void
    {
        $status = $message->status()->where('user_id', $user->id)->first();
        if ($status && $status->pivot->delivered_at) {
            return;
        }
        $message->status()->updateExistingPivot($user->id, [
            'delivered_at' => now(),
        ]);
    }

    public function markAsRead(Message $message, User $user): void
    {
        $status = $message->status()->where('user_id', $user->id)->first();

        if ($status && $status->pivot->read_at) {
            return;
        }

        if (!$status->pivot->delivered_at) {

            $message->status()->updateExistingPivot($user->id, [
                'delivered_at' => now(),
                'read_at' => now(),
            ]);

            return;
        }

        $message->status()->updateExistingPivot($user->id, [
            'read_at' => now(),
        ]);
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
        $statuses = $message->status()->where('user_id', '!=', $user->id)->get();

        $read = true;
        $delivered = true;
        foreach ($statuses as $status) {
            if (!$status->pivot->read_at) {
                $read = false;
            }
            if (!$status->pivot->delivered_at) {
                $delivered = false;
                $read = false;
                break;
            }
        }

        return $read ? 'read' : ($delivered ? 'delivered' : 'sent');
    }
}
