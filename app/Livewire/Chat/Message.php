<?php

namespace App\Livewire\Chat;

use Livewire\Component;

class Message extends Component
{
    public $message;
    public $user;

    public function mount($message)
    {
        $this->message = $message;
        $this->user = $message->user;
    }

    public function render()
    {
        return view('livewire.chat.message');
    }
}
