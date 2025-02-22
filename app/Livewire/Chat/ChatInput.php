<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Services\MessageService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatInput extends Component
{
    public Chat $chat;
    public string $text;

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->text = '';
    }

    public function render()
    {
        return view('livewire.chat.chat-input');
    }

    public function sendMessage()
    {
        $this->validate([
            'text' => 'required|string',
        ]);

        $message = app(MessageService::class)->send($this->chat, Auth::user(), $this->text);

        $this->dispatch('message.sent', $message);
        $this->reset('text');
    }
}
