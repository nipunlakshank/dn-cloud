<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatMessages extends Component
{
    public Chat $chat;
    public int $page = 1;
    public ?Collection $messages;
    public int $messageCount;
    public int $moreMessagesLimit = 20;
    public bool $allMessagesLoaded = false;
    public Message $latestMessage;


    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->messageCount = $chat->messages()->count();
        $this->loadMessages();
    }

    #[On('chat.loadMoreMessages')]
    public function loadMessages()
    {
        if ($this->allMessagesLoaded) {
            return;
        }

        $skip = $this->messageCount - ($this->page * $this->moreMessagesLimit);

        $moreMessages = $this->chat->messages()
            ->orderBy('created_at', 'asc')
            ->orderBy('id', 'asc')
            ->skip($skip)
            ->take($this->moreMessagesLimit)
            ->get();

        if ($moreMessages->isEmpty()) {
            $this->allMessagesLoaded = true;
        }

        if (!empty($this->messages)) {
            $this->messages = $moreMessages->merge($this->messages);
        } else {
            $this->messages = $moreMessages;
        }
        $this->page++;
    }

    #[On('chat.select')]
    public function selectChat(Chat $chat)
    {
        $this->chat = $chat;
    }

    #[On(['message.sent', 'message.received'])]
    public function pushMessage()
    {
        $lastestMessage = $this->chat->messages()->latest()->first();
        if (!empty($this->latestMessage) && $this->latestMessage->id === $lastestMessage->id) {
            return;
        }
        $this->latestMessage = $lastestMessage;
        $this->messages = $this->messages->push($this->latestMessage);
        $this->messageCount++;
        $this->dispatch('message.pushed', $this->latestMessage->id);
    }

    public function render()
    {
        return view('livewire.chat.chat-messages');
    }
}
