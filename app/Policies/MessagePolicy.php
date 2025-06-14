<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;

class MessagePolicy
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
    public function view(User $user, Message $message): bool
    {
        return $user->is_active
            && $user->activeChats()
                ->where('chat_id', $message->chat_id)
                ->exists();
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
    public function update(User $user, Message $message): bool
    {
        return $user->is_active
            && $user->activeChats()
                ->where('chat_id', $message->chat_id)
                ->exists();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Message $message): bool
    {
        return false;
    }

    public function deleteForMe(User $user, Message $message): bool
    {
        return $user->is_active
            && $user->id === $message->user_id;
    }

    public function deleteForAll(User $user, Message $message): bool
    {
        return $user->is_active
            && $message->canDeleteForAll($user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Message $message): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Message $message): bool
    {
        return false;
    }
}
