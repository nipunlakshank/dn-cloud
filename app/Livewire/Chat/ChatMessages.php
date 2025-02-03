<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ChatMessages extends Component
{
    use WithPagination;

    public Chat $chat;
    public int $page = 1;

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
    }

    #[On('chatSelected')]
    public function loadMessages(Chat $chat)
    {
        $this->chat = $chat;
    }

    public function render()
    {
        return view('livewire.chat.chat-messages', [
            'messages' => $this->chat->messages()
                ->orderBy('created_at', 'desc')
                ->paginate(10, ['*'], 'page', $this->page)
        ]);
    }

    public function loadMoreMessages()
    {
        $this->page++;
    }
}
