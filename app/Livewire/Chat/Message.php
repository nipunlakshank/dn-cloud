<?php

namespace App\Livewire\Chat;

use App\Models\Message as MessageModel;
use App\Models\User;
use Livewire\Component;

class Message extends Component
{
    public MessageModel $message;
    public User $user;
    public string $avatar;

    public function mount(MessageModel $message)
    {
        $this->message = $message;
        $this->user = $message->user()->withFullName()->first();
        $this->avatar = $this->user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->user->name) . '&background=random';
    }

    public function render()
    {
        return view('livewire.chat.message');
    }
}
