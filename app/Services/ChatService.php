<?php

namespace App\Services;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;

class ChatService
{
    public function getUnreadCount(Chat $chat, User $user)
    {
        return $chat->messages()
            ->whereDoesntHave('status', function ($query) use ($user) {
                $query->where('user_id', $user->id)->whereNotNull('read_at');
            })
            ->where('user_id', '!=', $user->id)
            ->count();
    }

    public function markAsDelivered(Chat $chat, User $user)
    {
        Message::where('chat_id', $chat->id)
            ->where('user_id', '!=', $user->id)
            ->whereDoesntHave('status', function ($query) use ($user) {
                $query->where('user_id', $user->id)->whereNotNull('delivered_at');
            })
            ->each(function ($message) use ($user) {
                $message->status()->updateExistingPivot($user->id, [
                    'delivered_at' => now(),
                ]);
            });
    }

    public function markAsRead(Chat $chat, User $user)
    {
        Message::where('chat_id', $chat->id)
            ->where('user_id', '!=', $user->id)
            ->whereDoesntHave('status', function ($query) use ($user) {
                $query->where('user_id', $user->id)->whereNotNull('read_at');
            })
            ->each(function ($message) use ($user) {
                $message->status()->updateExistingPivot($user->id, [
                    'read_at' => now(),
                ]);
            });
    }
}
