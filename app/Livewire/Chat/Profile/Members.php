<?php

namespace App\Livewire\Chat\Profile;

use App\Models\Chat;
use App\Models\User;
use App\Services\GroupService;
use Livewire\Component;

class Members extends Component
{
    public Chat $chat;
    public $chatMembers;
    public $allUsers;

    public function getChatMembers() {}

    public function removeMember(Chat $chat, User $member)
    {
        $group = $chat->group;
        app(GroupService::class)->removeUser($group, $member);
        $this->chatMembers = $this->chat->users()->get();
    }

    public function mount($chat, $users)
    {
        $this->chat = $chat;
        $this->chatMembers = $chat->users;
        $this->allUsers = $users;
    }

    public function render()
    {
        return view('livewire.chat.profile.members');
    }
}
