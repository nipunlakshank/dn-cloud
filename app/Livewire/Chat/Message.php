<?php

namespace App\Livewire\Chat;

use App\Models\Message as MessageModel;
use App\Models\User;
use App\Services\MessageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Number;
use Livewire\Component;

class Message extends Component
{
    public MessageModel $message;
    public int $messageId;
    public User $user;
    public $messageStatus;
    public string $avatar;
    public bool $isOwner;
    public bool $inAGroup;
    public string $state;
    public array $attachments;
    public int $imageCount;

    public function refreshState()
    {
        $this->state = app(MessageService::class)->getState($this->message, Auth::user());
    }

    public function markAsDelivered()
    {
        app(MessageService::class)->markAsDelivered($this->message, Auth::user());
        $this->state = app(MessageService::class)->getState($this->message, Auth::user());
    }

    public function markAsRead()
    {
        app(MessageService::class)->markAsRead($this->message, Auth::user());
        $this->state = app(MessageService::class)->getState($this->message, Auth::user());
    }

    public function markAsNoted()
    {
        app(MessageService::class)->markAsNoted($this->message, Auth::user());
        $this->state = app(MessageService::class)->getState($this->message, Auth::user());
    }

    public function downloadAttachment($attachmentId)
    {
        return app(MessageService::class)->downloadAttachment($attachmentId);
    }

    public function mount(MessageModel $message)
    {
        $this->message = $message;
        $this->messageId = $message->id;
        $this->user = $message->user()->withFullName()->first();
        $this->messageStatus = $message->status();
        $this->avatar = $this->user->avatar
            ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->user->name) . '&background=random';
        $this->isOwner = $this->user->id === Auth::id();
        $this->inAGroup = $message->chat->is_group;
        $this->state = app(MessageService::class)->getState($message);

        $this->imageCount = 0;
        $this->attachments = $message->attachments
            ->map(function ($attachment) {
                $attachment->size = Number::fileSize($attachment->size);
                if ($attachment->category === 'image') {
                    $this->imageCount++;
                }

                return $attachment;
            })
            ->toArray();
    }

    public function render()
    {
        return view('livewire.chat.message');
    }
}
