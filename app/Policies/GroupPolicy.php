<?php

namespace App\Policies;

use App\Enums\App\UserRoles;
use App\Enums\Chat\UserRoles as ChatRoles;
use App\Models\Group;
use App\Models\User;

class GroupPolicy
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
    public function view(User $user, Group $group): bool
    {
        return $user->is_active
            && $user->activeChats()->pluck('chats.id')->contains($group->chat->id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_active
            && ($user->role === UserRoles::SuperAdmin || $user->role === UserRoles::Admin);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Group $group): bool
    {
        return $user->is_active
            && $user->activeChats()
                ->where('chat_id', $group->chat_id)
                ->where('role', ChatRoles::Owner)
                ->where('role', ChatRoles::Admin)
                ->exists();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Group $group): bool
    {
        return $user->is_active
            && $user->activeChats()
                ->where('chat_id', $group->chat_id)
                ->where('role', ChatRoles::Owner)
                ->exists();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Group $group): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Group $group): bool
    {
        return false;
    }
}
