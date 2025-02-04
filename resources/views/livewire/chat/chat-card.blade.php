<div
    wire:key="chat-last-message-{{ $chat->id . '-' . $chat->lastMessage->id }}"
    wire:poll="refreshLastMessage()"
    wire:click="selectChat"
    class="{{ $selected ? 'bg-gray-400 dark:bg-gray-800' : 'bg-gray-200 dark:bg-gray-700' }} relative cursor-pointer select-none justify-between rounded-lg border-none p-4 pt-6 text-start">

    <span class="absolute right-4 top-2 text-xs font-normal text-gray-500 dark:text-gray-400"
        disabled="false">
        {{ $timeElapsed }}
    </span>
    <div class="relative flex items-center gap-2">
        <img class="h-10 w-10 rounded-full"
            src="{{ $chatAvatar }}"
            alt="Jese image">
        <div class="grid w-full grid-cols-1">
            <span class="truncate text-sm font-semibold text-gray-900 dark:text-gray-100">
                {{ $chatName . ' (' . $chat->users->count() . ')' }}
            </span>
            <div class="flex w-full items-center justify-between gap-1">
                <span class="last-message truncate py-1 text-sm font-normal text-gray-900 dark:text-white">
                    {{ $chat->lastMessage->text ?? '-' }}
                </span>
                @if (isset($unreadCount) && $unreadCount > 0)
                    <span
                        class="h-fit rounded-full bg-lime-400 px-[0.5em] py-[0.1em] text-xs text-gray-800 dark:bg-lime-700 dark:text-gray-100">
                        {{ $unreadCount ?? '0' }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
