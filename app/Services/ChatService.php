<?php

namespace App\Services;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public static function pin(Chat $chat)
    {
        $chat->users()->updateExistingPivot(Auth::id(), [
            'pinned_at' => now(),
        ]);
    }

    public static function unPin(Chat $chat)
    {
        $chat->users()->updateExistingPivot(Auth::id(), [
            'pinned_at' => null,
        ]);
    }

    public static function togglePin(Chat $chat): bool
    {
        $chat->isPinned() ? self::unPin($chat) : self::pin($chat);

        return $chat->isPinned();
    }

    public function markAsDelivered(Chat $chat, User $user)
    {
        DB::transaction(function () use ($chat, $user) {
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
        });
    }

    public function markAsRead(Chat $chat, User $user)
    {
        DB::transaction(function () use ($chat, $user) {
            DB::update('
                UPDATE message_status
                SET read_at = ?
                WHERE user_id = ?
                AND message_id IN (
                    SELECT id FROM messages
                    WHERE chat_id = ? AND user_id != ?
                )
                AND read_at IS NULL
            ', [now(), $user->id, $chat->id, $user->id]);
        });
    }
}
