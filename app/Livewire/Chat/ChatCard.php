<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatCard extends Component
{
    public Chat $chat;
    public $lastMessage;
    public $timeElapsed;
    public $unreadCount;
    public $chatName;
    public $chatAvatar;
    public $selected;

    #[On('chatChanging')]
    public function chatChanging(Chat $chat)
    {
        if ($chat->id !== $this->chat->id) {
            $this->selected = false;
        }
    }

    #[On('chat.deselect')]
    public function deselectChat()
    {
        $this->selected = false;
    }

    public function selectChat()
    {
        if ($this->selected) {
            return;
        }
        $this->selected = true;
        $this->dispatch('chatChanging', $this->chat);
        $this->dispatch('chatSelected', $this->chat);
    }

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->selected = false;
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

    #[On('message.sent')]
    public function newMessageCheck(mixed $message)
    {
        $message = Json::decode($message, false);
        if ($message->chat_id !== $this->chat->id) {
            return;
        }
        $this->refreshLastMessage();
        $this->unreadCount = $this->chat->unreadCount;
    }


    public function refreshLastMessage()
    {
        $this->lastMessage = $this->chat->lastMessage()->first();
        $this->timeElapsed = $this->calculateTimeElapsed();
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
