<?php

namespace App\Livewire\Chat\Profile;

use App\Models\Chat;
use App\Services\GroupService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Component;

class Members extends Component
{
    public Chat $chat;
    public Collection $chatMembers;

    public function removeMember(int $userId)
    {
        app(GroupService::class)->removeUser($this->chat->group, $userId);
        $this->updateMembers();
        $this->dispatch('member.updated');
    }

    #[On('group-addMember')]
    public function addMemberToGroup($event)
    {
        app(GroupService::class)->addUser($this->chat->group, $event['userId']);
        $this->updateMembers();
        $this->dispatch('member.updated');
    }

    protected function updateMembers()
    {
        $this->chatMembers = $this->chat->users()->get()
            ->collect()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name(),
                    'email' => $user->email,
                    'role' => $user->role(),
                    'canRemove' => Gate::allows('removeUser', [$this->chat->group, $user->id]),
                ];
            });
    }

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->updateMembers();
    }

    public function render()
    {
        return view('livewire.chat.profile.members');
    }
}
