<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Database\Eloquent\Casts\Json;
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

        $message = Message::create([
            'chat_id' => $this->chat->id,
            'user_id' => Auth::id(),
            'text' => $this->text,
        ]);

        $this->dispatch('message.sent', Json::encode($message));
        $this->text = '';
    }
}
