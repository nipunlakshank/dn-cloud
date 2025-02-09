<?php

namespace App\Livewire\Modals;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewChat extends Component
{
    public array $users;

    public function mount()
    {
        $this->users = User::where('id', '!=', Auth::id())->withFullName()->get()->toArray();
    }

    public function render()
    {
        return view('livewire.modals.new-chat');
    }
}
