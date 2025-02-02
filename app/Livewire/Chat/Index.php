<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public ?Chat $chat;

    public function mount()
    {
        $this->chat = Auth::user()->activeChats->first();
    }

    public function render()
    {
        return view('livewire.chat.index', [
            'chat' => $this->chat,
        ]);
    }

    public function selectChat(Chat $chat)
    {
        $this->chat = $chat;
    }

    public function deselectChat()
    {
        $this->chat = null;
    }
}
