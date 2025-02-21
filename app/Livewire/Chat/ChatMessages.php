<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\Message;
use App\Services\MessageService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
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
    public int $scrollHeight = -1;
    public bool $unreadMessagesMarked;

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->messageCount = $chat->messages()->count();
        $this->unreadMessagesMarked = false;
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
            ->with('status')
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

        if ($this->scrollHeight !== -1) {
            $this->dispatch('chat.moreMessagesLoaded', ['scrollHeight' => $this->scrollHeight, 'topMessageId' => $this->messages->first()->id]);
        }
    }

    #[On('chat.scrollUpdate')]
    public function updateScroll($scrollHeight)
    {
        $this->scrollHeight = $scrollHeight;
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
        app(MessageService::class)->markAsRead($this->latestMessage, Auth::user());
    }

    public function isRead(Message $message): bool
    {
        return app(MessageService::class)->isRead($message);
    }

    // PERF: This method always calls the service, which is not necessary
    // public function markChatAsRead()
    // {
    //     $this->messages->each(function ($message) {
    //         app(MessageService::class)->markAsRead($message, Auth::user());
    //     });
    //
    //     $this->dispatch('chat.read', $this->chat->id);
    // }

    public function shouldAddUnreadMarker(Message $message): bool
    {
        if ($this->unreadMessagesMarked) {
            return false;
        }
        if ($this->isRead($message)) {
            return false;
        }

        $this->unreadMessagesMarked = true;

        return true;
    }

    public function render()
    {
        return view('livewire.chat.chat-messages');
    }
}
