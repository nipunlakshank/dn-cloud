<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatList extends Component
{
    public ?Collection $chats;
    public ?Chat $selectedChat;

    public function mount()
    {
        $this->loadChats();
        $this->selectedChat = null;
    }

    #[On('chatSelected')]
    public function selectChat(Chat $chat)
    {
        $this->selectedChat = $chat;
    }

    public function refreshChats()
    {
        $this->loadChats();
    }

    public function loadChats()
    {
        $this->chats = User::find(Auth::id())
            ->activeChats()
            ->with('lastMessage')
            ->get();
    }

    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
