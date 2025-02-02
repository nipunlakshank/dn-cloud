<?php

namespace App\Livewire\Chat;

use Livewire\Component;

class ChatCard extends Component
{
    public $chat;
    public $lastMessage;
    public $timeElapsed;
    public $unreadCount;

    public function mount($chat)
    {
        $this->chat = $chat;
        $this->lastMessage = $chat->lastMessage;
        $this->timeElapsed = $this->calculateTimeElapsed($this->lastMessage->created_at);
        $this->unreadCount = $chat->unreadCount ?? 24;
    }

    public function render()
    {
        return view('livewire.chat.chat-card', [
            'chat' => $this->chat,
        ]);
    }

    public function refreshLastMessage()
    {
        $this->lastMessage = $this->chat->lastMessage()->get();
    }

    public function calculateTimeElapsed($timestamp)
    {
        if ($timestamp->diffInSeconds() < 60) {
            return 'Just now';
        } elseif ($timestamp->diffInHours() < 6) {
            return $timestamp->shortAbsoluteDiffForHumans();
        } elseif ($timestamp->isToday()) {
            return $timestamp->format('H:i');
        } else {
            return $timestamp->format('d/m/Y');
        }
    }
}
