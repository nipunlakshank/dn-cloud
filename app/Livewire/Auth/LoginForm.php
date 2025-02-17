<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginForm extends Component
{
    #[Validate('required|email|string')]
    public $email = '';

    #[Validate('string|min:7')]
    public $password = '';

    #[Validate('boolean')]
    public $remember = '';

    public $message;
    public $message_style;
    public $isPreAuthenticated = false;
    public $visibility = Visibility::Hide;
    public $buttonType = ButtonType::Next;

    /**
     * Check password availability and show password field.
     */
    public function pre_authenticate(): void
    {
        $this->validate();

        if ($this->isPreAuthenticated == true) {
            $this->authenticate();
        } else {
            if ($this->has_password($this->email)) {
                $this->show();
            } else {
                $this->reset_password();
            }
        }
    }

    /**
     * Authenticate user & store session
     *
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function authenticate()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email', 'string', 'lowercase'],
            'password' => ['required', 'min:7'],
        ]);

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();
            $this->message = Messages::Success;
            $this->message_style = MessagesStyle::Success;

            return redirect()->route('dashboard');
        }

        $this->message = Messages::Failed;
        $this->message_style = MessagesStyle::Failed;
    }

    /**
     * Show hidden fields
     */
    public function show()
    {
        $this->visibility = Visibility::Show;
        $this->buttonType = ButtonType::Login;
        $this->isPreAuthenticated = true;
    }

    /**
     * Determine if the user password is null or not.
     *
     * @param  mixed  $email
     */
    public function has_password($email): bool
    {
        $user = User::where('email', '=', $email)->first();
        if ($user !== null) {
            $nullPasswordUsers = User::whereNull('password')->get('email');

            return !$nullPasswordUsers->contains('email', $email);
        } else {
            Log::info('Invalid User Credentials :' . $this->email . ' : ' . $this->password);
        }

        return false;
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }

    public function reset_password()
    {
        return redirect()->route('password.request');
    }
}

enum Visibility: string
{
    case Hide = 'hidden';
    case Show = 'block';
}
enum ButtonType: string
{
    case Login = 'Log In';
    case Next = 'Next';
}

enum Messages: string
{
    case Success = 'Log in Successful';
    case Failed = 'Log in Failed. Invalid user credentials';
}

enum MessagesStyle: string
{
    case Success = 'text-green-500';
    case Failed = 'text-red-500';
}
