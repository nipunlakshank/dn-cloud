<?php

namespace App\Livewire\Chat\Profile;

use App\Models\User;
use Livewire\Component;

class ProfileInfo extends Component
{
    public $chat;

    public $isGroup = false;

    public $users;

    public function mount($chat)
    {
        $this->chat = $chat;
        $this->isGroup = $this->chat->is_group;
        $this->users = User::all()->toArray();
    }

    public function render()
    {
        return view('livewire.chat.profile.profile-info', ['users' => $this->users]);
    }
}
