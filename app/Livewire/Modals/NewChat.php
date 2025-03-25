<?php

namespace App\Livewire\Modals;

use App\Actions\Chat\CreatePrivateChatAction;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class NewChat extends Component
{
    public array $users;

    public function startChat(int $userId)
    {
        $chat = app(CreatePrivateChatAction::class)->execute($userId);

        $this->dispatch('chat.select', Chat::find($chat->id));
        $this->dispatch('newChat', ['chatId' => $chat->id]);
    }

    public function mount()
    {
        $this->users = User::where('id', '!=', Auth::id())->withFullName()->get()
            ->collect()
            ->filter(fn ($user) => Gate::allows('chatWith', $user))
            ->toArray();
    }

    public function render()
    {
        return view('livewire.modals.new-chat');
    }
}
