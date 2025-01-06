<div class="fixed left-0 top-0 z-30 w-full border-none bg-gray-200 px-4 lg:left-1/4 dark:bg-gray-800">
    <div class="flex items-center justify-between p-4">
        <div class="items flex">
<img class="w-10 h-10 rounded-full relative" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Jese image">
<span class="text-sm font-semibold ml-4 text-gray-900 dark:text-white">{{ $chatName ?? "Unknown" }}</span>
            <button class="flex items-center lg:hidden" type="button"
                onclick="showChatList()">
                <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                </svg>
            </button>
        </div>
    </div>

</div>
