<div
    wire:key="chat-last-message-{{ $chat->id . '-' . $chat->lastMessage->id }}"
    wire:poll
    class="relative cursor-pointer select-none justify-between rounded-lg border-none bg-gray-200 p-4 pt-6 text-start dark:bg-gray-700">
    <span class="absolute right-4 top-2 text-xs font-normal text-gray-500 dark:text-gray-400"
        disabled="false">
        {{ $timeElapsed }}
    </span>
    <div class="relative flex items-center space-x-2">
        <img class="h-10 w-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
            alt="Jese image">
        <div class="grid grid-cols-1">
            <span class="truncate text-sm font-semibold text-gray-900 dark:text-gray-100">
                @if ($chat->is_group)
                    {{ $chat->name ?? 'Unknown' }} (Group)
                @else
                    {{ $chat->otherUsers(auth()->user())->first()->name() ?? 'Unknown' }}
                @endif
            </span>
            <span class="last-message truncate py-1 text-sm font-normal text-gray-900 dark:text-white">
                {{ $chat->lastMessage->content ?? '-' }}
            </span>
            @if (isset($unreadCount) && $unreadCount > 0)
                <span
                    class="absolute bottom-1 right-[-4ch] rounded-full bg-orange-500 px-[0.5em] py-[0.1em] text-xs">
                    {{ $unreadCount ?? '0' }}
                </span>
            @endif
        </div>
    </div>
</div>
