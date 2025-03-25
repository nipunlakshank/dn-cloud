<?php

namespace App\Livewire\Chat\Profile;

use App\Models\Chat;
use Livewire\Component;

class ProfileInfo extends Component
{
    public Chat $chat;
    public bool $isGroup = false;

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->isGroup = $this->chat->is_group;
    }

    public function render()
    {
        return view('livewire.chat.profile.profile-info');
    }
}
