<?php

namespace App\Livewire\Chat;

use Livewire\Attributes\On;
use Livewire\Component;

class ProfileInfoModal extends Component
{
    public $visibility = Visibility::HIDE;
    public $chat;

    public function mount($chat)
    {
        $this->chat = $chat;
    }

    public function render()
    {
        return view('livewire.chat.profile-info-modal');
    }

    #[On('showProfile')]
    public function showProfile()
    {
        $this->visibility = Visibility::SHOW;
    }

    public function closeProfile()
    {
        $this->visibility = Visibility::HIDE;
    }
}

enum Visibility: string
{
    case SHOW = 'flex';
    case HIDE = 'hidden';
}
