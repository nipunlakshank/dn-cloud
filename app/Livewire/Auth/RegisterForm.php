<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class RegisterForm extends Component
{
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $role;

    public function register()
    {
        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        ]);

        User::create($validated)->assignRole($this->validate(['role' => ['string', 'in:admin,supervisor,accountant,worker']])['role']);
        $this->reset(['first_name', 'last_name', 'email']);
        $this->dispatch('alert', ['message' => 'User created successfully', 'type' => 'success']);
    }

    public function mount()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->role = 'worker';
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
