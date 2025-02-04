<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatHeader extends Component
{
    public Chat $chat;
    public $chatName;
    public $chatAvatar;

    public function mount(Chat $chat)
    {
        $this->setChatDetails($chat);
    }

    #[On('chat.select')]
    public function setChatDetails(Chat $chat)
    {
        $this->chat = $chat;
        if ($this->chat->is_group) {
            $this->chatName = $this->chat->name;
        } else {
            $this->chatName = $this->chat->otherUsers(Auth::user())->first()->name();
        }

        if ($this->chat->is_group) {
            $this->chatAvatar = $this->chat->avatar;
        } else {
            $this->chatAvatar = $this->chat->otherUsers(Auth::user())->first()->avatar;
        }

        $this->chatAvatar = $this->chatAvatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->chatName) . '&background=random';
    }

    public function render()
    {
        return view('livewire.chat.chat-header');
    }
}
