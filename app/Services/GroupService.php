<?php

namespace App\Services;

use App\Models\Chat;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GroupService
{
    public function create(string $name, ?string $avatar, array $memberIds, ?User $owner = null)
    {
        return DB::transaction(function () use ($owner, $name, $avatar, $memberIds) {
            $chat = Chat::create(['is_group' => true]);

            $group = Group::create([
                'chat_id' => $chat->id,
                'name' => $name,
                'avatar' => $avatar,
            ]);

            $owner = $owner ?? Auth::user();
            $chat->users()->attach($owner->id, ['role' => 'owner']);
            $chat->users()->sync($memberIds, ['role' => 'member']);

            return $group;
        });
    }

    public function update(Group $group, string $name, ?string $avatar = null): bool
    {
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

    public function addUser(User $user, Group $group, string $role = 'member'): void
    {
        DB::transaction(function () use ($user, $group, $role) {
            $group->chat->users()->attach($user->id, ['role' => $role]);
        });
    }

    public function removeUser(User $user, Group $group): void
    {
        DB::transaction(function () use ($user, $group) {
            $group->chat->users()->detach($user->id);
        });
    }

    public function changeUserRole(User $user, Group $group, string $role): void
    {
        DB::transaction(function () use ($user, $group, $role) {
            $group->chat->users()->updateExistingPivot($user->id, ['role' => $role]);
        });
    }

    public function delete(Group $group): bool
    {
        return DB::transaction(function () use ($group) {
            // Delete the associated chat (cascade will delete group)
            $group->chat->delete();
        });
    }
}
