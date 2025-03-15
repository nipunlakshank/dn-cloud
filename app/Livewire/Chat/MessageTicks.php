<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use App\Services\MessageService;
use Livewire\Component;

class MessageTicks extends Component
{
    public Message $message;
    public string $state;
    private MessageService $messageService;

    public function refreshState()
    {
        $this->state = app(MessageService::class)->getState($this->message);
    }

    public function mount(Message $message)
    {
        $this->messageService = app(MessageService::class);
        $this->message = $message;
        $this->state = $this->messageService->getState($message);
    }

    public function render()
    {
        return view('livewire.chat.message-ticks');
    }
}
