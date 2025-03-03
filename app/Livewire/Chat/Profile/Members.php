<?php

namespace App\Livewire\Chat\Profile;

use App\Models\Chat;
use App\Models\ChatUser;
use Livewire\Attributes\On;
use Livewire\Component;

class Members extends Component
{
    public Chat $chat;
    public $chatMembers = '';

    public function mount($chat)
    {
        $this->chat = $chat;
        $this->chatMembers = $chat->users;
    }

    public function render()
    {
        return view('livewire.chat.profile.members');
    }

    public function removeMember($user_id, $chat_id)
    {
        ChatUser::where('user_id', '=', $user_id, 'and')->where('chat_id', '=', $chat_id)->delete();
        $this->chatMembers = $this->chat->users;
        $this->dispatch('member.updated');
    }

    #[On('group-addMember')]
    public function addMemberToGroup($params)
    {
        ChatUser::create(['chat_id' => $this->chat->id, 'user_id' => $params['user_id'], 'role' => 'member']);
        $this->chat = Chat::firstWhere('id', $this->chat->id);
        $this->chatMembers = $this->chat->users;
        $this->dispatch('member.updated');
        $this->dispatch('member.list.update')->to(SelectUserDropdown::class);
    }
}
