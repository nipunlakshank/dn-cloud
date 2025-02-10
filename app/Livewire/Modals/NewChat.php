<?php

namespace App\Livewire\Modals;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewChat extends Component
{
    public array $users;
    public string $avatar;

    public function startChat(int $userId)
    {
        $chat = Chat::query()
            ->where('is_group', false)
            ->whereHas('users', function ($query) {
                $query->where('user_id', Auth::id());
            })->whereHas('users', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->first();

        $chat = $chat ?? Chat::create(['is_group' => false]);
        $chat->users()->sync([$userId, Auth::id()]);

        $this->dispatch('chat.select', Chat::find($chat->id));
    }

    public function mount()
    {
        $users = User::where('id', '!=', Auth::id())->withFullName()->get()->collect();
        $users->each(function (User $user) {
            $user->avatar = $user->avatarUrl();
        });
        $this->users = $users->toArray();
    }

    public function render()
    {
        return view('livewire.modals.new-chat');
    }
}
