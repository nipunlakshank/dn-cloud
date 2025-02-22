<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginForm extends Component
{
    #[Validate('required|email|string')]
    public $email = '';

    #[Validate('string|min:6')]
    public $password = '';

    #[Validate('boolean')]
    public $remember = false;

    public $message;
    public $is_pre_authenticated = false;
    public $visibility = Visibility::Hide;
    public $buttonType = ButtonType::Next;

    /**
     * For styling only
     */
    public $message_style;

    public $disable_field = false;
    public $email_focus = true;
    public $password_focus = false;

    /**
     * Check password availability and show password field.
     */
    public function pre_authenticate(): void
    {
        $this->validate();

        switch (User::where('email', '=', $this->email)->get()->count() == 1) {
            case true:
                switch ($this->is_pre_authenticated) {
                    case true:
                        $this->authenticate();
                        break;
                    case false:
                        switch ($this->has_password($this->email)) {
                            case true:
                                $this->show();
                                break;
                            case false:
                                $this->reset_password();
                                break;
                        }
                }
            case false:
                break;
        }
    }

    /**
     * Authenticate user
     *
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function authenticate(): void
    {
        $credentials = $this->validate([
            'email' => ['required', 'email', 'string', 'lowercase'],
            'password' => ['required', 'min:6'],
        ]);

        if (Auth::attempt($credentials, $this->remember)) {
            $this->login($credentials);
        }

        $this->message = Messages::Failed;
        $this->message_style = MessagesStyle::Failed;
    }

    /**
     * Store user sessions
     *
     * @param  mixed  $credentials
     * @return RedirectResponse
     */
    public function login($credentials)
    {
        if (!$this->is_active($credentials['email'])) {
            session()->invalidate();

            return redirect()->route('notice.inactive');
        }

        if (!$this->is_email_verified($credentials['email'])) {
            return redirect()->route('verification.notice');
        }

        session()->regenerate();
        $this->message = Messages::Success;
        $this->message_style = MessagesStyle::Success;

        return redirect()->route('dashboard');
    }

    /**
     * Check user is active or inactive
     *
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function is_active(string $email): bool
    {
        if (User::where('email', $email)->value('is_active') == 1) {
            return true;
        }

        return false;
    }

    /**
     * Check email is verified or not
     */
    public function is_email_verified(string $email): bool
    {
        if (User::where('email', '=', $email)->value('email_verified_at') != null) {
            return true;
        }

        return false;
    }

    /**
     * Show hidden fields
     */
    public function show()
    {
        $this->visibility = Visibility::Show;
        $this->buttonType = ButtonType::Login;
        $this->is_pre_authenticated = true;
        $this->password_focus = true;
        $this->email_focus = false;
        $this->disable_field = 'disabled';

        $this->dispatch('focus.password');
    }

    /**
     * Determine if the user password is null or not.
     */
    public function has_password(string $email): bool
    {
        $user = User::where('email', '=', $email)->first();
        if ($user !== null) {
            $nullPasswordUsers = User::whereNull('password')->get('email');

            return !$nullPasswordUsers->contains('email', $email);
        }

        return false;
    }

    /**
     *  Redirect to reset password
     */
    public function reset_password()
    {
        return redirect()->route('password.request');
    }

    /**
     * Render view
     */
    public function render()
    {
        return view('livewire.auth.login-form');
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
