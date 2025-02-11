<?php

namespace App\Livewire\Modals;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateGroup extends Component
{
    public array $users;
    public Collection $selectedUserIds;
    public int $selectedUserCount;


    #[On('group.create.addUser')]
    public function addUser($id)
    {
        if ($this->selectedUserIds->contains($id)) {
            return;
        }

        $this->selectedUserIds->push($id);
        $this->selectedUserCount = $this->selectedUserIds->count();
    }

    #[On('group.create.removeUser')]
    public function removeUser($id)
    {
        $this->selectedUserIds = $this->selectedUserIds->reject(fn ($selectedId) => $selectedId === $id);
        $this->selectedUserCount = $this->selectedUserIds->count();
    }

    #[On('group.create.clearSelectedUsers')]
    public function clearSelectedUsers()
    {
        $this->selectedUserIds = Collection::empty();
        $this->selectedUserCount = $this->selectedUserIds->count();
    }

    public function createGroup()
    {
        dump($this->selectedUserIds);
    }

    public function mount()
    {
        $this->users = User::where('id', '!=', Auth::id())->withFullName()->get()->toArray();
        $this->selectedUserIds = Collection::empty();
        $this->selectedUserCount = $this->selectedUserIds->count();
    }

    public function render()
    {
        return view('livewire.modals.create-group');
    }
}
