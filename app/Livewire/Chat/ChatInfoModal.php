<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatInfoModal extends Component
{
    public Visibility $visibility;
    public Chat $chat;

    #[On('showProfile')]
    public function showProfile()
    {
        $this->visibility = Visibility::SHOW;
    }

    public function closeProfile()
    {
        $this->visibility = Visibility::HIDE;
    }

    public function mount($chat)
    {
        $this->chat = $chat;
        $this->visibility = Visibility::HIDE;
    }

    public function render()
    {
        return view('livewire.chat.chat-info-modal');
    }
}

enum Visibility: string
{
    case SHOW = 'flex';
    case HIDE = 'hidden';
}
