<?php

namespace App\Actions\Chat;

use App\Models\Chat;
use App\Models\ChatUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CreatePrivateChatAction
{
    /**
     * Create a new private chat.
     *
     * @param int $userId
     * @return Chat
     */
    public function execute(int $userId): Chat
    {
        return DB::transaction(function () use ($userId) {
            $authUser = Auth::user();

            if (!$authUser) {
                throw ValidationException::withMessages(['user' => 'Unauthorized']);
            }

            if ($authUser->id === $userId) {
                throw ValidationException::withMessages(['chat' => 'Cannot create a chat with yourself.']);
            }

            // Check if a chat already exists
            $existingChat = Chat::where('is_group', false)
                ->whereHas('users', function ($query) use ($authUser, $userId) {
                    $query->whereIn('user_id', [$authUser->id, $userId]);
                }, '=', 2) // Ensure exactly 2 users are in the chat
                ->first();

            if ($existingChat) {
                return $existingChat;
            }

            // Create a new private chat
            $chat = Chat::create(['is_group' => false]);

            // Attach users
            ChatUser::insert([
                ['chat_id' => $chat->id, 'user_id' => $authUser->id],
                ['chat_id' => $chat->id, 'user_id' => $userId],
            ]);

            return $chat;
        });
    }
}
