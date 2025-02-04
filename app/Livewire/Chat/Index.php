<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public ?Chat $chat;

    public function mount()
    {
        $this->chat = null;
    }

    public function render()
    {
        return view('livewire.chat.index');
    }

    #[On('chatSelected')]
    public function selectChat(Chat $chat)
    {
        $this->chat = $chat;
    }

    #[On('chat.deselect')]
    public function deselectChat()
    {
        $this->chat = null;
    }
}
