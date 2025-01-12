<div class="flex justify-between rounded-lg border-0 bg-gray-200 p-4 dark:bg-gray-700">
    <div class="flex items-center space-x-2">
        <img class="h-10 w-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
            alt="Jese image">
        <div class="col-span-1 grid">
            <span
                class="truncate text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $chatName ?? 'Unknown' }}</span>
            <span class="truncate py-1 text-sm font-normal text-gray-900 dark:text-white">
                {{ $lastMessage ?? '-' }}
            </span>
        </div>
    </div>
    <span class="text-sm font-normal text-gray-500 dark:text-gray-400" dir="rtl">{{ $time ?? '00:00' }}</span>
</div>
