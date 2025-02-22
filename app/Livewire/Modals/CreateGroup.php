<?php

namespace App\Livewire\Modals;

use App\Models\User;
use App\Services\GroupService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class CreateGroup extends Component
{
    use WithFileUploads;

    public string $name = '';
    public ?TemporaryUploadedFile $avatar = null;
    public array $users = [];
    public Collection $selectedUserIds;
    public int $selectedUserCount = 0;

    #[On('group.create.addUser')]
    public function addUser($id)
    {
        if (!$this->selectedUserIds->contains($id)) {
            $this->selectedUserIds->push($id);
            $this->selectedUserCount = $this->selectedUserIds->count();
        }
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
        $this->selectedUserCount = 0;
    }

    public function createGroup()
    {
        $this->validate([
            'name' => 'required|string',
            'avatar' => 'nullable|image|max:1024', // Ensure Livewire file validation works
        ]);

        $avatarPath = null;

        // Ensure $avatar is a valid file before storing
        if ($this->avatar instanceof TemporaryUploadedFile) {
            $avatarPath = $this->avatar->store('avatars', 'public');
        }

        $members = $this->selectedUserIds->toArray();
        $members[] = Auth::id();

        app(GroupService::class)->create($this->name, $avatarPath, $members);

        $this->dispatch('group.created');
        $this->dispatch('alert', ['message' => 'Group created successfully!', 'type' => 'success']);

        $this->clearSelectedUsers();
        $this->reset(['name', 'avatar']);
    }

    public function mount()
    {
        $this->selectedUserIds = collect();
        $this->users = User::where('id', '!=', Auth::id())->withFullName()->get()->toArray();
    }

    public function render()
    {
        return view('livewire.modals.create-group');
    }
}
