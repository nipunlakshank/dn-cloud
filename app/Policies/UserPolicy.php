<?php

namespace App\Policies;

use App\Enums\App\UserRoles;
use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->is_active;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        if (!$user->is_active) {
            return false;
        }

        if ($user->role === UserRoles::Developer->value) {
            return true;
        }

        if ($model->role === UserRoles::Developer->value) {
            return false;
        }

        if ($user->role === UserRoles::SuperAdmin->value && $model->role !== UserRoles::Developer->value) {
            return true;
        }

        if ($user->role === UserRoles::Admin->value && $model->role !== UserRoles::SuperAdmin->value && $model->role !== UserRoles::Admin->value) {
            return true;
        }

        return $user->id === $model->id;
    }

    public function chatWith(User $user, User $model): bool
    {
        if ($user->role === UserRoles::Developer->value && $model->role === UserRoles::Developer->value) {
            return true;
        }
        if ($model->role === UserRoles::Developer->value) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_active && $user->role === UserRoles::SuperAdmin->value;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->is_active && $user->role === UserRoles::SuperAdmin->value || $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }

    public function changeStatus(User $user, User $model): bool
    {
        return $user->is_active && $user->role === UserRoles::SuperAdmin->value && $user->id !== $model->id;
    }

    public function changeRole(User $user, User $model): bool
    {
        return $user->is_active && $user->role === UserRoles::SuperAdmin->value && $user->id !== $model->id;
    }
}
