<?php

namespace App\Livewire\Chat\Profile;

use App\Models\Chat;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class SelectUserDropdown extends Component
{
    public Chat $chat;
    public $existUsers;
    public $users = [];

    public function mount($chat)
    {
        $this->chat = $chat;
        $this->existUsers = $this->chat->users;
        $this->users = $this->findNotExitingUsers();
    }

    public function render()
    {
        return view('livewire.chat.profile.select-user-dropdown');
    }

    public function addMember($user_id)
    {
        $this->dispatch('group-addMember', ['user_id' => $user_id])->to(Members::class);
    }

    public function findNotExitingUsers(): array
    {
        $userList = [];
        $allUsers = User::all();

        foreach ($allUsers as $user) {
            $isExist = false;

            $existUsers = $this->existUsers;
            foreach ($existUsers as $eUser) {
                if ($eUser->id == $user->id) {
                    $isExist = true;
                    break;
                }
            }

            if (!$isExist) {
                $userList[] = $user;
            }
        }

        return $userList;
    }

    #[On('member.list.update')]
    public function updatedList()
    {
        $this->existUsers = $this->chat->users;
        $this->users = $this->findNotExitingUsers();
        $this->dispatch('member.updated')->self();
    }
}
