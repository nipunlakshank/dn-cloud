<?php

namespace App\Livewire\Chat;

use App\Models\Message as MessageModel;
use App\Models\User;
use Livewire\Component;

class Message extends Component
{
    public MessageModel $message;
    public User $user;

    public function mount(MessageModel $message)
    {
        $this->message = $message;
        $this->user = $message->user;
    }

    public function render()
    {
        return view('livewire.chat.message');
    }
}
