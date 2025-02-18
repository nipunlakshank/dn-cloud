<?php

namespace App\Livewire\Modals;

use App\Models\User;
use App\Services\GroupService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateGroup extends Component
{
    public string $name;
    public $avatar;
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
        $this->validate([
            'name' => 'required|string',
            'avatar' => 'nullable|image|max:1024',
        ]);

        $avatar = null;
        if ($this->avatar) {
            $avatar = $this->avatar->store('avatars');
        }

        $members = $this->selectedUserIds->toArray();
        $members[] = Auth::id();

        app(GroupService::class)->create($this->name, $avatar, $members);

        $this->dispatch('group.created');
        $this->dispatch('alert', ['message' => 'Group created successfully!', 'type' => 'success']);
        $this->clearSelectedUsers();
        $this->name = '';
        $this->avatar = null;
    }

    public function mount()
    {
        $this->name = '';
        $this->avatar = null;
        $this->users = User::where('id', '!=', Auth::id())->withFullName()->get()->toArray();
        $this->selectedUserIds = Collection::empty();
        $this->selectedUserCount = $this->selectedUserIds->count();
    }

    public function render()
    {
        return view('livewire.modals.create-group');
    }
}
