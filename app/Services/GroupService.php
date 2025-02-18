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
    public function create(string $name, ?string $avatar, array $members, ?User $owner = null)
    {
        return DB::transaction(function () use ($owner, $name, $avatar, $members) {
            $chat = Chat::create(['is_group' => true]);

            $group = Group::create([
                'chat_id' => $chat->id,
                'name' => $name,
                'avatar' => $avatar,
            ]);

            $owner = $owner ?? Auth::user();
            $chat->users()->attach($owner->id, ['role' => 'owner']);

            foreach ($members as $memberId) {
                if ($memberId != $owner->id) {
                    $chat->users()->attach($memberId, ['role' => 'member']);
                }
            }

            return $group;
        });
    }

    public function update(Group $group, string $name, ?string $avatar = null)
    {
        if ($avatar) {
            if ($group->avatar) {
                Storage::delete($group->avatar);
            }
            $group->avatar = $avatar;
        }

        $group->name = $name;
        $group->save();

        return $group;
    }

    public function addUser(Group $group, User $user, string $role = 'member')
    {
        $group->chat->users()->attach($user->id, ['role' => $role]);
    }

    public function removeUser(Group $group, User $user)
    {
        $group->chat->users()->detach($user->id);
    }

    public function changeUserRole(Group $group, User $user, string $role)
    {
        $group->chat->users()->updateExistingPivot($user->id, ['role' => $role]);
    }

    public function delete(Group $group)
    {
        return DB::transaction(function () use ($group) {
            // Delete the associated chat (cascade will delete group)
            $group->chat->delete();
        });
    }
}
