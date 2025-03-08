<div
    x-data="{ unreadCount: @entangle('unreadCount') }"
    tabindex="0"
    wire:click="selectChat"
    x-on:keyup.enter="$wire.selectChat()"
    class="chat-card {{ $selected ? ' bg-gray-400 dark:bg-gray-800' : 'bg-gray-200 dark:bg-gray-700' }} relative cursor-pointer select-none justify-between rounded-lg border-none p-4 pt-6 text-start">

    <span class="absolute right-4 top-2 text-xs font-normal text-gray-500 dark:text-gray-400"
        x-init="() => setInterval(() => $wire.refreshLastMessage(), 1000)">
        {{ $timeElapsed }}
    </span>

    <div class="relative flex items-center gap-2">
        <img class="h-10 w-10 rounded-full" src="{{ $chatAvatar }}" alt="Chat Avatar">

        <div class="grid w-full grid-cols-1">
            <div class="flex gap-1 truncate text-sm font-semibold text-gray-900 dark:text-gray-100">
                @if ($isGroup)
                    <span class="inline-block">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 6C10.067 6 8.5 7.567 8.5 9.5C8.5 11.433 10.067 13 12 13C13.933 13 15.5 11.433 15.5 9.5C15.5 7.567 13.933 6 12 6ZM10.5 14C8.29086 14 6.5 15.7909 6.5 18C6.5 19.1046 7.39543 20 8.5 20H15.5C16.6046 20 17.5 19.1046 17.5 18C17.5 15.7909 15.7091 14 13.5 14H10.5Z"
                                fill="currentColor" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.3193 10.9036C17.4372 10.4555 17.5 9.98509 17.5 9.5C17.5 7.37184 16.2913 5.52599 14.5229 4.61149C15.0855 4.22572 15.7664 4 16.5 4C18.433 4 20 5.567 20 7.5C20 9.15086 18.857 10.5348 17.3193 10.9036ZM19.5 18H20C21.1046 18 22 17.1046 22 16C22 13.7909 20.2091 12 18 12H16.9003C16.7636 12.2674 16.6056 12.5222 16.4286 12.7621C18.2613 13.789 19.5 15.7498 19.5 18Z"
                                fill="currentColor" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4 7.5C4 5.567 5.567 4 7.5 4C8.23363 4 8.91455 4.22572 9.47708 4.61149C7.70871 5.52599 6.5 7.37184 6.5 9.5C6.5 9.98509 6.5628 10.4555 6.68071 10.9036C5.14295 10.5348 4 9.15086 4 7.5ZM7.09971 12H6C3.79086 12 2 13.7909 2 16C2 17.1046 2.89543 18 4 18H4.5C4.5 15.7498 5.73868 13.789 7.57136 12.7621C7.39438 12.5222 7.23642 12.2674 7.09971 12Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                @endif
                <span class="inline-block truncate">
                    {{ $chatName }}
                </span>
            </div>
            <div class="flex w-full items-center justify-between gap-1">
                <div class="flex w-full gap-1 py-1">
                    @if ($isGroup && $chat->lastMessage)
                        <span
                            class="inline-block whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-gray-200">
                            {{ $chat->lastMessage->user->is(auth()->user()) ? 'Me' : $chat->lastMessage->user->name() ?? '-' }}:
                        </span>
                    @endif
                    <span
                        class="last-message inline-block truncate text-sm font-normal text-gray-700 dark:text-gray-300">
                        {{ $chat->lastMessage->text ?? '-' }}
                    </span>
                </div>
                <span
                    x-show="unreadCount > 0"
                    class="h-fit rounded-full bg-lime-400 px-[0.5em] py-[0.1em] text-xs text-gray-800 dark:bg-lime-700 dark:text-gray-100">
                    {{ $unreadCount ?? '0' }}
                </span>
            </div>
        </div>
    </div>
</div>
