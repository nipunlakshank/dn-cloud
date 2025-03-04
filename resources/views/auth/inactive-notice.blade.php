<x-guest-layout>
    <div id="alert-additional-content-2"
        class="mb-4 rounded-lg border border-red-300 bg-red-50 p-4 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
        role="alert">
        <div class="flex items-center gap-1">
            <svg class="me-2 h-4 w-4 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium">Notice</h3>
        </div>
        <div class="my-2 text-sm">
            Your Account is Currently in Inactive State.
            <br><br>
            Please contact 'Admin' to 'Activate' your account. Otherwise you can't access your account.
        </div>
        <div class="mt-4 flex justify-end">
            <a href="{{ route('login') }}" autofocus
                class="me-2 inline-flex items-center gap-3 rounded-lg bg-red-500 px-3 py-4 text-center text-xs font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg class="ms-2 h-3 w-3 rotate-180 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
                Back to Login
            </a>
        </div>
    </div>
</x-guest-layout>
