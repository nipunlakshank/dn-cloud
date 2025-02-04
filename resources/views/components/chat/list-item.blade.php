<button class="cursor-pointer justify-between rounded-lg border-none bg-gray-200 p-4 text-start dark:bg-gray-700">
    <span class="float-right text-xs font-normal text-gray-500 dark:text-gray-400"
        dir="rtl">{{ $time ?? '00:00' }}</span>
    <div class="flex items-center space-x-2">
        <img class="h-10 w-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
            alt="Avatar">
        <div class="relative col-span-1 grid">
            <span class="truncate text-sm font-semibold text-gray-900 dark:text-gray-100">
                {{ $chatName ?? 'Unknown' }}
            </span>
            <span class="last-message truncate py-1 text-sm font-normal text-gray-900 dark:text-white">
                {{ $lastMessage ?? '-' }}
            </span>
            @if (isset($unreadCount) && $unreadCount > 0)
                <span
                    class="absolute bottom-1 right-[-4ch] rounded-full bg-orange-500 px-[0.375em] py-[0.1em] text-xs">
                    {{ $unreadCount ?? '0' }}
                </span>
            @endif
        </div>
    </div>
</button>
