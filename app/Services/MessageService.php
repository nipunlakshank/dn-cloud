<?php

namespace App\Services;

use App\Models\Chat;
use App\Models\Message;
use App\Models\MessageAttachment;
use App\Models\MessageReaction;
use App\Models\User;
use Exception;
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
                $path = Storage::put('attachments', $attachment);
                MessageAttachment::create([
                    'message_id' => $message->id,
                    'path' => $path,
                    'type' => $attachment->getClientMimeType(),
                ]);
            }

            return $message;
        });
    }

    public function delete(Message $message)
    {
        $message->update(['is_deleted' => true]);
    }

    public function reply(Message $originalMessage, User $user, string $text, $attachments = [])
    {
        return $this->send($originalMessage->chat, $user, $text, $attachments, $originalMessage->id);
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
}
