<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatHeader extends Component
{
    public Chat $chat;
    public string $chatName;
    public string $chatAvatar;
    public bool $isGroup = false;
    public string $chatInfo;

    #[On('chat.select')]
    public function setChatDetails(Chat $chat)
    {
        $this->chat = $chat;
        $this->isGroup = $this->chat->is_group;
        if ($this->isGroup) {
            $this->chatName = $this->chat->group->name;
        } else {
            $this->chatName = $this->chat->otherUsers(Auth::id())->first()->name();
        }

        if ($this->isGroup) {
            $this->chatAvatar = $this->chat->group->avatar_url;
        } else {
            $this->chatAvatar = $this->chat->otherUsers(Auth::id())->first()->avatar_url;
        }

        $this->chatAvatar = $this->chatAvatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->chatName) . '&background=random';

        $this->chatInfo = $this->isGroup ? 'Members: ' . $this->chat->group->chat->users()->count() : $this->chat->otherUsers(Auth::id())->first()->email;
    }

    public function mount(Chat $chat)
    {
        $this->setChatDetails($chat);
    }

    public function render()
    {
        return view('livewire.chat.chat-header');
    }
}
