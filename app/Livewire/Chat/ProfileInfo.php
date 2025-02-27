<?php

namespace App\Livewire\Chat;

use App\Models\User;
use Livewire\Component;

class ProfileInfo extends Component
{

    public $chat;

    public $users;

    public function mount($chat)
    {
        $this->chat = $chat;
        $this->users = User::all()->toArray();
    }

    public function render()
    {
        return view('livewire.chat.profile-info', ['users' => $this->users]);
    }
}
