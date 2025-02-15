<?php

namespace App\Livewire\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginForm extends Component
{
    #[Validate("required|email|string")]
    public $email = '';

    public $visibility = Visibility::Hide;
    public $next = Visibility::Show;

    /**
     * Handle an incoming request and check password availability.
     */
    public function authenticate(): mixed
    {
        $this->validate();
        if ($this->hasPassword($this->email)) {
            $this->show();
            return response('Please reset your password before login', 200);
        } else {
            // End Password Reset Link to Email
            // Send to Login and alert email link
            $data['email'] = $this->email;
            return redirect()->route('password.request')->with(compact('data'));
        }
    }

    public function login(LoginRequest $request): void
    {
        $request->attributes->set('email', $this->email);
        $request->attributes->set('password', $this->password);
        $request->attributes->set('remember', $this->remember);
        $this->redirect(route('login'));
    }

    public function show()
    {
        $this->visibility = Visibility::Show;
        $this->next = Visibility::Hide;
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }

    /**
     * Determine if the user password is null or not.
     * @param mixed $email
     * @return bool
     */
    public function hasPassword($email): bool
    {
        $user = User::where('email', '=', $email)->first();
        if ($user !== null) {
            $nullPasswordUsers = User::whereNull("password")->get("email");
            return !$nullPasswordUsers->contains("email", $email);
        } else {
            Log::info("No Such User");
        }
        return false;
    }
}

enum Visibility: string
{
    case Hide = "hidden";
    case Show = "block";
}
