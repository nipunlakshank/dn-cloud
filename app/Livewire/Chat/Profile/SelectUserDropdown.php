<?php

namespace App\Livewire\Chat\Profile;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Component;

class SelectUserDropdown extends Component
{
    public Chat $chat;
    public Collection $users;

    public function addMember(int $userId)
    {
        $this->dispatch('group-addMember', ['userId' => $userId])->to(Members::class);
    }

    #[On('member.updated')]
    public function updateUsers()
    {
        $this->users = User::whereNotIn('id', $this->chat->users->pluck('id'))
            ->get()
            ->collect()
            ->filter(fn ($user) => Gate::allows('chatWith', $user))
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name(),
                    'email' => $user->email,
                ];
            });
    }

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->updateUsers();
    }

    public function render()
    {
        return view('livewire.chat.profile.select-user-dropdown');
    }
}
