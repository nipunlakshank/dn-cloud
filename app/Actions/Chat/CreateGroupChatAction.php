<?php

namespace App\Actions\Chat;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CreateGroupChatAction
{
    /**
     * Create a new group chat.
     *
     * @param string $name
     * @param array $userIds
     * @param string|null $avatar
     * @return Chat
     */
    public function execute(string $name, array $userIds, ?string $avatar = null): Chat
    {
        return DB::transaction(function () use ($name, $userIds, $avatar) {
            $authUser = Auth::user();

            if (!$authUser) {
                throw ValidationException::withMessages(['user' => 'Unauthorized']);
            }

            // Create chat
            $chat = Chat::create(['is_group' => true]);

            // Create group details
            Group::create([
                'chat_id' => $chat->id,
                'name' => $name,
                'avatar' => $avatar,
            ]);

            // Add owner
            ChatUser::create([
                'chat_id' => $chat->id,
                'user_id' => $authUser->id,
                'role' => 'owner',
            ]);

            // Add members
            foreach ($userIds as $userId) {
                if ($userId !== $authUser->id) {
                    ChatUser::create([
                        'chat_id' => $chat->id,
                        'user_id' => $userId,
                        'role' => 'member',
                    ]);
                }
            }

            return $chat;
        });
    }
}
