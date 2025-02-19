<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatCard extends Component
{
    public Chat $chat;
    public ?Message $lastMessage;
    public ?string $timeElapsed;
    public ?int $unreadCount;
    public ?string $chatName;
    public ?string $chatAvatar;
    public bool $selected;

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
        $this->dispatch('chat.select', $this->chat);
    }

    #[On('chat.select')]
    public function updatedSelected(Chat $chat)
    {
        $this->selected = $chat->id === $this->chat->id;
    }

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->selected = false;
        $this->lastMessage = $chat->lastMessage ?? null;
        $this->timeElapsed = $this->calculateTimeElapsed($this->lastMessage?->created_at);
        $this->unreadCount = $chat->unreadCount ?? 0;

        if ($chat->is_group) {
            $this->chatName = $chat->group->name;
        } else {
            $this->chatName = $chat->otherUsers(Auth::id())->first()->name();
        }

        if ($chat->is_group) {
            $this->chatAvatar = $chat->group->avatar;
        } else {
            $this->chatAvatar = $chat->otherUsers(Auth::id())->first()->avatar;
        }

        $this->chatAvatar = $this->chatAvatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->chatName) . '&background=random';
    }

    public function render()
    {
        return view('livewire.chat.chat-card');
    }

    #[On('message.sent')]
    public function newMessageCheck(Message $message)
    {
        if ($message->chat_id !== $this->chat->id) {
            return;
        }
        $this->refreshLastMessage();
        $this->unreadCount = $this->chat->unreadCount;
    }

    public function refreshLastMessage()
    {
        if ($this->chat->lastMessage === null) {
            return;
        }

        $this->lastMessage = $this->lastMessage ?? null;

        if ($this->chat->lastMessage()->first()->id !== $this->lastMessage?->id) {
            $this->lastMessage = $this->chat->lastMessage()->first();
            if ($this->lastMessage->user_id !== Auth::id()) {
                $this->unreadCount = ($this->unreadCount ?? 0) + 1;
                $this->dispatch('message.received', $this->lastMessage);
            }
        }
        $this->timeElapsed = $this->calculateTimeElapsed();
    }

    public function calculateTimeElapsed($timestamp = null)
    {
        $timestamp = $timestamp ?? $this->lastMessage?->created_at;
        if (!$timestamp) {
            return null;
        }
        if ($timestamp->diffInSeconds() < 60) {
            return 'Just now';
        }

        return $timestamp->shortAbsoluteDiffForHumans();
    }
}
