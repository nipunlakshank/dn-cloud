<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use Livewire\Component;

class Index extends Component
{
    public ?Chat $chat;

    public function mount(?Chat $chat)
    {
        $this->chat = $chat;
    }

    public function render()
    {
        return view('livewire.chat.index', [
            'chat' => $this->chat,
        ]);
    }
}
