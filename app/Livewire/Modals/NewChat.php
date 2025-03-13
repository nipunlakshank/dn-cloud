<?php

namespace App\Livewire\Modals;

use App\Actions\Chat\CreatePrivateChatAction;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewChat extends Component
{
    public array $users;

    public function startChat(int $userId)
    {
        // $chat = Chat::query()
        //     ->where('is_group', false)
        //     ->whereHas('users', function ($query) {
        //         $query->where('user_id', Auth::id());
        //     })->whereHas('users', function ($query) use ($userId) {
        //         $query->where('user_id', $userId);
        //     })->first();
        //
        // $chat = $chat ?? Chat::create(['is_group' => false]);
        // $chat->users()->sync([$userId, Auth::id()]);

        $chat = app(CreatePrivateChatAction::class)->execute($userId);

        $this->dispatch('chat.select', Chat::find($chat->id));
        $this->dispatch('newChat', ['chatId' => $chat->id]);
    }

    public function mount()
    {
        $this->users = User::where('id', '!=', Auth::id())->withFullName()->get()->toArray();
    }

    public function render()
    {
        return view('livewire.modals.new-chat');
    }
}
