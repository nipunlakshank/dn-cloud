<?php

namespace App\Livewire\Chat;

use Livewire\Component;

class ChatCard extends Component
{
    public $chatName;
    public $lastMessage;
    public $time;

    public function render()
    {
        return view('livewire.chat.chat-card');
    }

    public function mount($chatName = null, $lastMessage = null, $time = null)
    {
        $this->chatName = $chatName ?? fake()->name();
        $this->lastMessage = $lastMessage ?? fake()->sentence();
        $this->time = $time ?? fake()->time('H:i');
    }
}
