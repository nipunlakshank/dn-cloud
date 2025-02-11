<div
    wire:poll="loadChats"
    class="flex flex-col gap-1 px-1 md:gap-2 lg:px-2">
    @forelse ($chats as $chat)
        @livewire('chat.chat-card', ['chat' => $chat], key('chat-card-' . $chat->id))
    @empty
        <div wire:key="empty-chat-list-{{ auth()->id() }}"
            class="mt-10 flex h-full w-full flex-col items-center justify-center gap-4 self-center">
            <button
                data-modal-toggle="new-chat-modal"
                class="flex w-[80%] items-center justify-center gap-1 rounded-lg bg-green-500 px-1 py-2 text-gray-100 dark:bg-green-700 dark:text-gray-100">
                <span class="">
                    Start a chat
                </span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16 19H20C20.5523 19 21 18.5523 21 18V17C21 15.3431 19.6569 14 18 14H16M13.7639 10C14.3132 10.6137 15.1115 11 16 11C17.6569 11 19 9.65685 19 8C19 6.34315 17.6569 5 16 5C15.1115 5 14.3132 5.38625 13.7639 6M3 18V17C3 15.3431 4.34315 14 6 14H10C11.6569 14 13 15.3431 13 17V18C13 18.5523 12.5523 19 12 19H4C3.44772 19 3 18.5523 3 18ZM11 8C11 9.65685 9.65685 11 8 11C6.34315 11 5 9.65685 5 8C5 6.34315 6.34315 5 8 5C9.65685 5 11 6.34315 11 8Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
            <button
                data-modal-toggle="create-group-modal"
                class="flex w-[80%] items-center justify-center gap-1 rounded-lg bg-blue-400 px-1 py-2 text-gray-100 dark:bg-blue-700 dark:text-gray-100">
                <span>Create a group</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.5 17H4C3.44772 17 3 16.5523 3 16C3 14.3431 4.34315 13 6 13H7M7 9.94999C5.85888 9.71836 5 8.70948 5 7.5C5 6.11929 6.11929 5 7.5 5C8.06291 5 8.58237 5.18604 9.00024 5.5M19.5002 17H20.0002C20.5525 17 21.0002 16.5523 21.0002 16C21.0002 14.3431 19.6571 13 18.0002 13H17.0002M17.0002 9.94999C18.1414 9.71836 19.0002 8.70948 19.0002 7.5C19.0002 6.11929 17.881 5 16.5002 5C15.9373 5 15.4179 5.18604 15 5.5M15.5 19H8.5C7.94771 19 7.5 18.5523 7.5 18C7.5 16.3431 8.84314 15 10.5 15H13.5C15.1569 15 16.5 16.3431 16.5 18C16.5 18.5523 16.0523 19 15.5 19ZM14.5 9.5C14.5 10.8807 13.3807 12 12 12C10.6193 12 9.5 10.8807 9.5 9.5C9.5 8.11929 10.6193 7 12 7C13.3807 7 14.5 8.11929 14.5 9.5Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
        </div>
    @endforelse
</div>
