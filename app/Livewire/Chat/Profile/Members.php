<?php

namespace App\Livewire\Chat\Profile;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\User;
use App\Services\GroupService;
use Livewire\Attributes\On;
use Livewire\Component;

class Members extends Component
{
    public Chat $chat;
    public $chatMembers;

    public function removeMember(User $member)
    {
        $group = $this->chat->group;
        app(GroupService::class)->removeUser($group, $member);
        $this->chatMembers = $this->chat->users()->get();
        $this->dispatch('member.updated');
    }

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->chatMembers = $chat->users;
    }

    public function render()
    {
        return view('livewire.chat.profile.members');
    }

    #[On('group-addMember')]
    public function addMemberToGroup($params)
    {
        ChatUser::create(['chat_id' => $this->chat->id, 'user_id' => $params['user_id'], 'role' => 'member']);
        $this->chat = Chat::firstWhere('id', $this->chat->id);
        $this->chatMembers = $this->chat->users()->get();
        $this->dispatch('member.updated');
    }
}
