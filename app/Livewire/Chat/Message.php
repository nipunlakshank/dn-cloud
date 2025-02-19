<?php

namespace App\Livewire\Chat;

use App\Models\Message as MessageModel;
use App\Models\User;
use App\Services\MessageService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Message extends Component
{
    public MessageModel $message;
    public User $user;
    public string $avatar;
    public bool $isOwner;
    public bool $inAGroup;
    public string $state;

    public function mount(MessageModel $message)
    {
        $this->message = $message;
        $this->user = $message->user()->withFullName()->first();
        $this->avatar = $this->user->avatar
            ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->user->name) . '&background=random';
        $this->isOwner = $this->user->id === Auth::id();
        $this->inAGroup = $message->chat->is_group;
        $this->state = app(MessageService::class)->getState($message);
    }

    public function render()
    {
        return view('livewire.chat.message');
    }
}
