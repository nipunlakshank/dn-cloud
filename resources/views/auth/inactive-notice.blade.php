<x-guest-layout>
    <div id="alert-additional-content-2" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <div class="flex items-center gap-1">
            <svg class="shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium">Notice</h3>
        </div>
        <div class="my-2 text-sm ">
            Your Account is Currently in Inactive State.<br>
            <br>
            Please contact 'Admin' for 'Activate' your account. Otherwise you can't access your account.
            <br>
            <br>
            Email : admin@dncloud.work
        </div>
        <div class="flex mt-4 justify-end">
            <a href="{{ route("login") }}" autofocus class="text-white gap-3 bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-4 me-2 text-center inline-flex items-center dark:bg-white dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg class="w-3 h-3 ms-2 rotate-180 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
                Back to Login
            </a>
        </div>
    </div>
</x-guest-layout>