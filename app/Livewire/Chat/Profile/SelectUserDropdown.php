<?php

namespace App\Livewire\Chat\Profile;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class SelectUserDropdown extends Component
{
    public Chat $chat;
    public Collection $users;

    public function addMember(int $user_id)
    {
        $this->dispatch('group-addMember', ['user_id' => $user_id])->to(Members::class);
    }

    #[On('member.updated')]
    public function updatedMembers()
    {
        $this->users = User::whereNotIn('id', $this->chat->users->pluck('id'))->get()->collect();
    }

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->users = User::whereNotIn('id', $chat->users->pluck('id'))->get()->collect();
    }

    public function render()
    {
        return view('livewire.chat.profile.select-user-dropdown');
    }
}
