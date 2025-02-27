<?php

namespace App\Livewire\Chat\Profile;

use App\Models\ChatUser;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Members extends Component
{
    public $chat = '';

    public $chatMembers = '';
    public $allUsers = [];

    public function mount($chat, $users)
    {
        $this->chatMembers = $chat->users;
        $this->allUsers = $users;
    }
    public function render()
    {
        return view('livewire.chat.profile.members');
    }

    public function removeMember($user_id, $chat_id)
    {
        ChatUser::where('user_id', '=', $user_id, 'and')->where('chat_id', '=', $chat_id)->delete();
    }
}
