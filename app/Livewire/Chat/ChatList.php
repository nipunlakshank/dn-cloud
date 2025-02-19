<?php

namespace App\Livewire\Chat;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatList extends Component
{
    public ?Collection $chats;

    public function mount()
    {
        $this->loadChats();
    }

    #[On(['message.sent', 'message.received'])]
    public function refreshChats()
    {
        $this->loadChats();
    }

    public function loadChats()
    {
        $this->chats = User::find(Auth::id())
            ->activeChats()
            ->with('lastMessage')
            ->with('group')
            ->get();

        $this->chats = $this->chats->filter(function ($chat) {
            return $chat->is_group || $chat->lastMessage !== null;
        });
    }

    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
