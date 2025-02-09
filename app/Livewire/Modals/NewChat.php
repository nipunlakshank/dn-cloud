<?php

namespace App\Livewire\Modals;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewChat extends Component
{
    public Collection $users;

    public function mount()
    {
        $this->users = User::query()->where('id', '!=', Auth::id())->withFullName()->get();
    }

    public function render()
    {
        return view('livewire.modals.new-chat');
    }
}
