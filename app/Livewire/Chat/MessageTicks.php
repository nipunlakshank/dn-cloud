<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use App\Services\MessageService;
use Livewire\Component;

class MessageTicks extends Component
{
    public Message $message;
    public string $state;

    public function refreshState()
    {
        $this->state = app(MessageService::class)->getState($this->message);
    }

    public function mount(Message $message)
    {
        $this->message = $message;
        $this->state = app(MessageService::class)->getState($message);
    }

    public function render()
    {
        return view('livewire.chat.message-ticks');
    }
}
