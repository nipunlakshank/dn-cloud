<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\Message;
use App\Services\MessageService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class LastMessageInfo extends Component
{
    public Chat $chat;
    public ?Message $message = null;
    public array $sender = [];
    public bool $isGroup;
    public string $text;
    public bool $isReport;
    public ?string $state = null;
    public bool $hasMessages;

    public function refreshState()
    {
        $this->state = app(MessageService::class)->getState($this->message);
    }

    #[On('newMessage')]
    public function newMessageCheck(?array $data = null)
    {
        $messageId = $data['messageId'] ?? null;
        $message = $messageId ? Message::find($messageId) : null;

        if (!$message || $message->chat_id !== $this->chat->id) {
            return;
        }
        $this->updateLastMessage();
    }

    public function updateLastMessage()
    {
        if (!$this->chat->lastMessage()->exists()) {
            return;
        }

        $lastMessage = $this->chat->lastMessage()->first();
        $this->hasMessages = true;

        if ($lastMessage->id === $this->message?->id) {
            return;
        }

        $this->message = $lastMessage;
        $this->sender = $lastMessage->user->only('id', 'first_name', 'last_name');
        $this->text = $lastMessage->text;
        $this->isReport = $lastMessage->is_report;

        if ($this->message->user_id !== Auth::id()) {
            $this->dispatch('newMessage', ['messageId' => $this->message?->id, 'chatId' => $this->chat->id]);
        }
    }

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->isGroup = $chat->is_group;
        $this->hasMessages = false;
        $this->updateLastMessage();
    }

    public function render()
    {
        return view('livewire.chat.last-message-info');
    }
}
