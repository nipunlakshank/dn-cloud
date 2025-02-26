<?php

namespace App\Policies;

use App\Enums\Chat\UserRoles as ChatRoles;
use App\Models\Chat;
use App\Models\User;

class ChatPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Chat $chat): bool
    {
        return $user->is_active
            && $user->id === $chat->users->pluck('users.id')->contains($user->id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_active;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chat $chat): bool
    {
        $chatUser = $user->activeChats()
            ->where('chat_id', $chat->id)
            ->where('user_id', $user->id)
            ->where('role', ChatRoles::Owner->value)
            ->where('role', ChatRoles::Admin->value)
            ->first();

        return $chatUser !== null;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chat $chat): bool
    {
        $chatUser = $user->activeChats()
            ->where('chat_id', $chat->id)
            ->where('user_id', $user->id)
            ->where('role', 'owner')
            ->first();

        return $chatUser !== null;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Chat $chat): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Chat $chat): bool
    {
        return false;
    }
}
