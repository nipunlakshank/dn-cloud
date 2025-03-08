<?php

namespace App\Livewire\Chat;

use App\Models\Message as MessageModel;
use App\Models\User;
use App\Services\MessageService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Number;
use Livewire\Component;

class Message extends Component
{
    public MessageModel $message;
    public int $messageId;
    public User $user;
    public string $avatar;
    public bool $isOwner;
    public bool $inAGroup;
    public string $state;
    public array $attachments;
    public int $imageCount;
    public Collection $notedAt;
    public bool $markedAsNoted;
    public string $messageText;
    public string $createdAt;

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
        $this->notedAt = $this->getNotedAt($this->message);
        $this->markedAsNoted = true;
    }

    public function downloadAttachment($attachmentId)
    {
        return app(MessageService::class)->downloadAttachment($attachmentId);
    }

    protected function getNotedAt(MessageModel $message)
    {
        return $message->status->map(function ($status) {
            return [
                'user_id' => $status->pivot->user_id,
                'noted_at' => $status->pivot->noted_at,
            ];
        })->filter(function ($status) {
            return !empty($status['noted_at']);
        });
    }

    public function mount(MessageModel $message)
    {
        $this->message = $message;
        $this->messageText = $message->text;
        $this->messageId = $message->id;
        $this->user = $message->user()->withFullName()->first();
        $this->avatar = $this->user->avatar
            ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->user->name) . '&background=random';
        $this->isOwner = $this->user->is(Auth::user());
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
        $this->notedAt = $this->getNotedAt($message);
        $this->markedAsNoted = app(MessageService::class)->isNoted($message, Auth::user());
        $createdAt = $message->created_at;
        $this->createdAt = $createdAt->isToday()
            ? $createdAt->format('h:i a')
            : $createdAt->day . ' ' . $createdAt->format('M') . ($createdAt->isCurrentYear() ? '' : ' ' . $createdAt->year) . ' ' . $createdAt->format('h:i a');
    }

    public function render()
    {
        return view('livewire.chat.message');
    }
}
