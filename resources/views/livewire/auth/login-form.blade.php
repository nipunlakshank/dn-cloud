<div>
    <form wire:submit.prevent="pre_authenticate"
        x-init="() => window.addEventListener('focus.password', e => setTimeout(() => document.getElementById('password').focus(), 0))">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="mt-1 block w-full" type="email" name="email"
                :value="old('email')" required autocomplete="username" :disabled=$disable_field :autofocus=$email_focus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="{{ $visibility }}">

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input wire:model="password" id="password" class="mt-1 block w-full" type="password"
                    name="password" autocomplete="current-password" :autofocus=$password_focus />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" wire:model="remember" type="checkbox" name="remember"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
        </div>

        <span class="{{ $message_style }}">{{ $message }}</span>

        <div class="mt-4 flex items-center justify-end">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                    class="{{ $visibility }} rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ $buttonType }}
            </x-primary-button>
        </div>
    </form>
</div>

