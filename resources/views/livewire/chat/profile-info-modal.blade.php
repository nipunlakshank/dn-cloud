<div id="profile-info-modal"
    class="{{ $visibility }} absolute inset-0 z-50 h-full w-full items-center justify-center overflow-x-hidden overflow-y-hidden bg-gray-900/80 bg-opacity-50 md:inset-0">
    <div class="p-2">
        <!-- Modal content -->
        <div class="max-h-[90vh] min-w-[60vw] rounded-lg bg-white shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="relative flex items-center justify-between rounded border-gray-200 dark:border-gray-600"
                wire:click="closeProfile">
                <button id="profile-close" type="button"
                    class="absolute right-[-1rem] top-[-1rem] ms-auto inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-200 text-sm text-gray-900 hover:bg-red-500 hover:text-gray-100 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-red-500 dark:hover:text-white">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="w-full p-4 md:p-5">
                @livewire('chat.profile.profile-info', ['chat' => $chat], key('chat-info-profile'))
            </div>
        </div>
    </div>
</div>
