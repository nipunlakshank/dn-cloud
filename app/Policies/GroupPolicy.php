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
            && ($user->role === UserRoles::SuperAdmin->value || $user->role === UserRoles::Admin->value);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Group $group): bool
    {
        return $user->is_active
            && $user->activeChats()
                ->where('chat_id', $group->chat_id)
                ->whereIn('role', [ChatRoles::Owner->value, ChatRoles::Admin->value])
                ->exists();
    }

    public function addUser(User $user, Group $group): bool
    {
        return $user->is_active
            && $user->activeChats()
                ->where('chat_id', $group->chat_id)
                ->whereIn('role', [ChatRoles::Owner->value, ChatRoles::Admin->value])
                ->exists();
    }

    public function removeUser(User $user, Group $group, int $memberId): bool
    {
        if (!$user->is_active) {
            return false;
        }

        $member = $group->chat->activeUsers()->where('user_id', $memberId)->first();

        if (!$member->exists()) {
            return false;
        }

        if ($member->pivot->role === ChatRoles::Owner->value) {
            return false;
        }

        if ($user->role === ChatRoles::Owner->value) {
            return true;
        }

        if ($member->pivot->role === ChatRoles::Admin->value) {
            return $user->activeChats()
                ->where('chats.id', $group->chat_id)
                ->exists();
        }

        return $user->activeChats()
            ->where('chats.id', $group->chat_id)
            ->whereIn('chat_user.role', [ChatRoles::Owner->value, ChatRoles::Admin->value])
            ->exists();
    }

    public function changeUserRole(User $user, Group $group): bool
    {
        return $user->is_active
            && $user->activeChats()
                ->where('chat_id', $group->chat_id)
                ->where('chat_user.role', ChatRoles::Owner->value)
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
                ->where('role', ChatRoles::Owner->value)
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
