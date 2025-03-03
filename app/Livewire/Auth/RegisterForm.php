<?php

namespace App\Livewire\Auth;

use App\Enums\App\UserRoles;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;

class RegisterForm extends Component
{
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $role;
    public array $roles;
    public bool $submitted;

    public function register()
    {
        $this->submitted = true;

        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'string', 'in:' . implode(',', $this->roles)],
        ]);

        User::create($validated);
        $this->reset(['first_name', 'last_name', 'email', 'role']);
        $this->dispatch('alert', ['message' => 'User created successfully', 'type' => 'success']);
    }

    public function mount()
    {
        $this->submitted = false;
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->role = '';

        $this->roles = Collection::make(array_column(UserRoles::cases(), 'value'))->filter(function ($role) {
            return $role !== UserRoles::SuperAdmin->value && $role !== UserRoles::Developer->value;
        })->toArray();
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
