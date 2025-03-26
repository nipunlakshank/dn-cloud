<?php

namespace App\Services;

use App\Enums\Wallet\WalletActions;
use App\Models\Chat;
use App\Models\Group;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletOperation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class GroupService
{
    public function create(string $name, ?string $avatar, array $memberIds, bool $isWallet, ?User $owner = null)
    {
        Gate::authorize('create', Group::class);

        return DB::transaction(function () use ($owner, $name, $avatar, $memberIds, $isWallet) {
            $chat = Chat::create(['is_group' => true]);

            $group = Group::create([
                'chat_id' => $chat->id,
                'name' => $name,
                'avatar' => $avatar,
            ]);

            $owner = $owner ?? Auth::user();
            $chat->users()->attach($owner->id, ['role' => 'owner']);
            $chat->users()->sync($memberIds, ['role' => 'member']);

            if ($isWallet) {
                $wallet = Wallet::create(['name' => $name, 'group_id' => $group->id]);
                WalletOperation::create(['wallet_id' => $wallet->id, 'user_id' => $owner->id, 'action' => WalletActions::Open]);
            }

            return $group;
        });
    }

    public function update(Group $group, string $name, ?string $avatar = null): bool
    {
        Gate::authorize('update', $group);

        return DB::transaction(function () use ($group, $name, $avatar) {
            if ($avatar && $group->avatar) {
                Storage::delete($group->avatar);
            }

            return $group->update([
                'name' => $name,
                'avatar' => $avatar ?? $group->avatar,
            ]);
        });
    }

    public function addUser(Group $group, int $userId, string $role = 'member'): void
    {
        Gate::authorize('addUser', $group);

        DB::transaction(function () use ($group, $userId, $role) {
            $userExists = $group->chat->users()->where('user_id', $userId)->exists();
            if ($userExists) {
                return;
            }
            $group->chat->users()->attach($userId, ['role' => $role]);
        });
    }

    public function removeUser(Group $group, int $userId): void
    {
        Gate::authorize('removeUser', [$group, $userId]);

        DB::transaction(function () use ($group, $userId) {
            $group->chat->users()->detach($userId);
        });
    }

    public function changeUserRole(User $user, Group $group, string $role): void
    {
        Gate::authorize('changeUserRole', $group);

        DB::transaction(function () use ($user, $group, $role) {
            $group->chat->users()->updateExistingPivot($user->id, ['role' => $role]);
        });
    }

    public function delete(Group $group): bool
    {
        Gate::authorize('delete', $group);

        return DB::transaction(function () use ($group) {
            $group->chat->delete();
        });
    }
}
