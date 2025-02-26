<?php

namespace App\Policies;

use App\Enums\App\UserRoles as AppRoles;
use App\Enums\Chat\UserRoles as ChatRoles;
use App\Models\User;
use App\Models\Wallet;

class WalletPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->is_active
            && ($user->role === AppRoles::SuperAdmin->value || $user->role === AppRoles::Admin->value);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Wallet $wallet): bool
    {
        $walletUserIds = $wallet->users->pluck('users.id');

        return $user->is_active
            && (
                $user->role === AppRoles::SuperAdmin->value
                || $user->role === AppRoles::Admin->value
                || $walletUserIds->contains($user->id)
            );
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_active
            && ($user->role === AppRoles::SuperAdmin->value || $user->role === AppRoles::Admin->value);
    }

    public function assignGroups(User $user): bool
    {
        return $user->is_active
            && ($user->role === AppRoles::SuperAdmin->value || $user->role === AppRoles::Admin->value);
    }

    public function assignUsers(User $user): bool
    {
        return $user->is_active
            && ($user->role === AppRoles::SuperAdmin->value || $user->role === AppRoles::Admin->value);
    }

    public function open(User $user, Wallet $wallet): bool
    {
        return $wallet
            ->group
            ?->users()
            ->where('users.id', $user->id)
            ->where('role', ChatRoles::Owner->value)
            ->orWhere('role', ChatRoles::Admin->value)
            ->first()
            ->exists();
    }

    public function close(User $user, Wallet $wallet): bool
    {
        return $wallet
            ->group
            ?->users()
            ->where('users.id', $user->id)
            ->where('role', ChatRoles::Owner->value)
            ->orWhere('role', ChatRoles::Admin->value)
            ->first()
            ->exists();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Wallet $wallet): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Wallet $wallet): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Wallet $wallet): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Wallet $wallet): bool
    {
        return false;
    }
}
