<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Login Form -->
    <livewire:auth.login-form></livewire:auth.login-form>
</x-guest-layout>