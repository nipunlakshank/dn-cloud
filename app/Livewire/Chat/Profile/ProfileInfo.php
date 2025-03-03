<?php

namespace App\Livewire\Chat\Profile;

use App\Models\Chat;
use App\Models\User;
use Livewire\Component;

class ProfileInfo extends Component
{
    public Chat $chat;
    public bool $isGroup = false;
    public array $users;

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->isGroup = $this->chat->is_group;
        $this->users = User::withFullName()->where('is_active', true)->get()->toArray();
    }

    public function render()
    {
        return view('livewire.chat.profile.profile-info');
    }
}
