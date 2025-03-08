<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use App\Services\ChatService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatCard extends Component
{
    public User $user;
    public Chat $chat;
    public ?Message $lastMessage;
    public ?string $timeElapsed;
    public ?int $unreadCount;
    public ?string $chatName;
    public ?string $chatAvatar;
    public bool $selected;
    public bool $isGroup;

    #[On('chat.deselect')]
    public function deselectChat()
    {
        $this->selected = false;
        session()->forget('chatId');
    }

    public function selectChat()
    {
        if ($this->selected) {
            return;
        }
        $this->dispatch('chat.select', $this->chat);
    }

    #[On('chat.select')]
    public function updatedSelected(?Chat $chat = null)
    {
        $chatId = $chat?->id ?? session('chatId');
        $this->selected = $chatId === $this->chat->id;
    }

    #[On('chat.read')]
    public function markAsRead($chatId)
    {
        if ($chatId !== $this->chat->id) {
            return;
        }
        $this->unreadCount = 0;
    }

    #[On('message.sent')]
    public function newMessageCheck(?int $messageId = null)
    {
        $message = $messageId ? Message::find($messageId) : null;

        if (!$message || $message->chat_id !== $this->chat->id) {
            return;
        }
        $this->refreshLastMessage();
        $this->unreadCount = $this->chat->unreadCount;
    }

    public function refreshLastMessage()
    {
        $this->updatedSelected();
        if ($this->chat->lastMessage === null) {
            return;
        }

        $this->lastMessage = $this->lastMessage ?? null;

        if ($this->chat->lastMessage()->first()->id !== $this->lastMessage?->id) {
            $this->lastMessage = $this->chat->lastMessage()->first();
            if ($this->lastMessage->user_id !== $this->user->id) {
                $this->unreadCount = ($this->unreadCount ?? 0) + 1;
                $this->dispatch('message.received', $this->lastMessage);
                if ($this->selected) {
                    $this->markAsRead($this->chat->id);
                }
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

    public function mount(Chat $chat)
    {
        $this->user = Auth::user();
        $this->chat = $chat;
        $this->selected = session('chatId') && session('chatId') === $chat->id;
        $this->lastMessage = $chat->lastMessage()->with('user')->first() ?? null;
        $this->timeElapsed = $this->calculateTimeElapsed($this->lastMessage?->created_at);
        $this->unreadCount = app(ChatService::class)->getUnreadCount($chat, $this->user);

        if ($chat->is_group) {
            $this->chatName = $chat->group->name;
        } else {
            $this->chatName = $chat->otherUsers(Auth::id())->first()->name();
        }

        $this->isGroup = $chat->is_group;

        if ($this->isGroup) {
            $this->chatAvatar = $chat->group->avatar_url;
        } else {
            $this->chatAvatar = $chat->otherUsers(Auth::id())->first()->avatar_url;
        }

        $this->chatAvatar = $this->chatAvatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->chatName) . '&background=random';
    }

    public function render()
    {
        return view('livewire.chat.chat-card');
    }
}
