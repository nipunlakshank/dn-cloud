<?php

namespace App\Livewire\Chat\Profile;

use Livewire\Component;

class ProfileInfo extends Component
{
    public $chat;
    public $isGroup = false;

    public function mount($chat)
    {
        $this->chat = $chat;
        $this->isGroup = $this->chat->is_group;
    }

    public function render()
    {
        return view('livewire.chat.profile.profile-info');
    }
}
