<?php

namespace App\Livewire\Chat;

use Livewire\Component;

class ChatContent extends Component
{
    public $chat;
    public $messages;
    public $page = 1;

    public function mount($chat)
    {
        $this->chat = $chat;
        // $this->messages = $this->chat->messages()->orderBy('created_at', 'desc')->paginate(10, ['*'], 'page', $this->page);
    }

    public function render()
    {
        return view('livewire.chat.chat-content');
    }

    public function loadMoreMessages()
    {
        $this->page++;
        $this->messages = $this->chat->messages()->orderBy('created_at', 'desc')->paginate(10, ['*'], 'page', $this->page);
    }
}
