<?php

namespace App\Livewire\Chat;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatCard extends Component
{
    public $chat;
    public $lastMessage;
    public $timeElapsed;
    public $unreadCount;
    public $chatName;
    public $chatAvatar;
    public $selected = false;

    public function selectChat()
    {
        $this->selected = true;
        $this->dispatch('chatSelected', $this->chat);
    }

    public function mount($chat)
    {
        $this->chat = $chat;
        $this->lastMessage = $chat->lastMessage;
        $this->timeElapsed = $this->calculateTimeElapsed($this->lastMessage->created_at);
        $this->unreadCount = $chat->unreadCount ?? 24;

        if ($chat->is_group) {
            $this->chatName = $chat->name;
        } else {
            $this->chatName = $chat->otherUsers(Auth::user())->first()->name();
        }

        if ($chat->is_group) {
            $this->chatAvatar = $chat->avatar;
        } else {
            $this->chatAvatar = $chat->otherUsers(Auth::user())->first()->avatar;
        }

        $this->chatAvatar = $this->chatAvatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->chatName) . '&background=random';
    }

    public function render()
    {
        return view('livewire.chat.chat-card');
    }

    public function refreshLastMessage()
    {
        $this->lastMessage = $this->chat->lastMessage()->get();
    }

    public function calculateTimeElapsed($timestamp = null)
    {
        $timestamp = $timestamp ?? $this->lastMessage->created_at;
        if ($timestamp->diffInSeconds() < 60) {
            return 'Just now';
        }
        return $timestamp->shortAbsoluteDiffForHumans();
    }
}
