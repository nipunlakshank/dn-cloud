<div class="flex space-x-4 py-4">
    <button class="flex items-center rounded-lg border border-transparent bg-gray-100 text-gray-500 md:hidden dark:bg-gray-700 dark:text-gray-300" type="button" onclick="showChatList()">
        <svg class="h-5 w-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
        </svg>
    </button>
    <div class="flex gap-3">
        <img class="relative h-10 w-10 rounded-full"
            src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Jese image">
        <div class="flex flex-col">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $chatName ?? 'Unknown' }}</span>

            <span class="text-sm font-light text-gray-900 dark:text-white">online</span>
        </div>

    </div>
</div>
