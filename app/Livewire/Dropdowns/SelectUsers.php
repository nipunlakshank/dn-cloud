<?php

namespace App\Livewire\Dropdowns;

use Livewire\Component;

class SelectUsers extends Component
{
    public array $users;


    public function mount(array $users)
    {
        $this->users = $users;
    }

    public function render()
    {
        return view('livewire.dropdowns.select-users');
    }
}
