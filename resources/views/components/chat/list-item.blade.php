<div class="flex-1 rounded-lg border-0 bg-gray-200 p-4 text-gray-600 dark:bg-gray-700 dark:text-white">

    <div class="flex space-x-2">

<img class="w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Jese image">
                                            <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $chatName ?? "Unknown" }}</span>
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400" dir="rtl">{{ $time ?? "23:12" }}</span>
    </div>
    <p class="text-sm text-nowrap overflow-hidden overflow-ellipsis font-normal py-1 text-gray-900 dark:text-white">{{ $lastMessage ?? "-" }}</p>

                    

        
</div>
