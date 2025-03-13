<div
    x-data="{
        state: { waiting: false, selected: false },
        chatId: Number({{ $chat->id }}),
        unreadCount: @entangle('unreadCount'),
        isPinned: @entangle('isPinned'),
        optionsMenu: null,
        selectChat() {
            if (this.state.selected) return
            setActiveChat(this.chatId, {
                callback: () => $wire.selectChat(),
                before: () => {
                    document.body.style.cursor = 'wait'
                    this.state.waiting = true
                },
                after: () => {
                    document.body.style.cursor = 'default'
                    this.state.waiting = false
                }
            })
            this.state.selected = true
            const event = new CustomEvent('activeChatUpdated', { detail: { chatId: this.chatId } })
            window.dispatchEvent(event)
        },
        updateSelected(chatId) {
            this.state.selected = chatId === this.chatId
        },
    }"
    x-init="() => {
        setInterval(() => $wire.refreshLastMessage(), 1000)
    
        window.addEventListener('newChat', e => updateSelected(e.detail[0].chatId))
        window.addEventListener('activeChatUpdated', e => updateSelected(e.detail.chatId))
        window.addEventListener('deselectChat', () => state.selected = false)
    
        state.selected = isActiveChat({{ $chat->id }})
        if (state.selected) {
            $wire.selectChat()
        }
    
        const options = {
            placement: 'bottom-end',
            triggerType: 'click',
            offsetSkidding: 0,
            offsetDistance: 10,
            ignoreClickOutsideClass: false,
        }
    
        const instanceOptions = {
            id: 'chatOptions-{{ $chat->id }}',
            override: true,
        }
        optionsMenu = new Dropdown(
            $refs.chatOptions,
            $refs.chatOptionsButton,
            options,
            instanceOptions
        )
    }"
    tabindex="0"
    x-on:click="selectChat()"
    x-on:keyup.enter="selectChat()"
    x-bind:class="{
        'bg-gray-400 dark:bg-gray-800': state.selected,
        'bg-gray-200 dark:bg-gray-700': !state.selected,
        'animate-pulse': state.waiting,
        '': !state.waiting,
    }"
    class="chat-card group relative select-none justify-between rounded-lg border-none p-4 pt-6 text-start">

    <span class="absolute right-4 top-2 text-xs font-normal text-gray-500 dark:text-gray-400">
        {{ $timeElapsed }}
    </span>

    <template x-if="isPinned">
        <span class="absolute left-4 top-2 text-xs font-normal text-gray-500 dark:text-gray-400">
            <svg
                version="1.1"
                id="svg216"
                xml:space="preserve"
                width="15"
                height="15"
                viewBox="0 0 32 32"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:svg="http://www.w3.org/2000/svg">
                <defs
                    id="defs220">
                    <clipPath
                        clipPathUnits="userSpaceOnUse"
                        id="clipPath230">
                        <path
                            d="M 0,24 H 24 V 0 H 0 Z"
                            id="path228" />
                    </clipPath>
                </defs>
                <g
                    id="g222"
                    transform="matrix(1.3333333,0,0,-1.3333333,0,32)">
                    <g
                        id="g224">
                        <g
                            id="g226"
                            clip-path="url(#clipPath230)">
                            <g
                                id="g232"
                                transform="translate(13.8359,3.3369)">
                                <path
                                    d="m 0,0 c 1.863,1.864 2.606,4.605 1.942,7.146 l -0.312,1.276 3.62,3.64 0.57,-0.571 c 0.902,-0.901 2.318,-1.05 3.293,-0.346 0.604,0.435 0.984,1.104 1.043,1.836 0.059,0.732 -0.205,1.451 -0.724,1.97 L 4.508,19.875 C 3.607,20.776 2.191,20.923 1.215,20.221 0.611,19.787 0.231,19.118 0.172,18.385 0.113,17.653 0.377,16.935 0.896,16.416 l 0.647,-0.647 -3.621,-3.64 -1.268,0.311 c -2.549,0.666 -5.291,-0.077 -7.154,-1.941 l -0.353,-0.353 10.499,-10.5 z m -6.3,2.765 -5.829,-5.809 -1.414,1.414 5.829,5.809 z"
                                    style="fill: currentColor;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path234" />
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </span>
    </template>

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
            <div
                x-bind:class="{ 'group-hover:pr-10': unreadCount > 0 }"
                class="relative flex w-full items-center justify-between gap-2 pr-2">
                <div class="flex w-full max-w-[90%] gap-1 py-1">
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
                    x-cloak
                    x-show="unreadCount > 0"
                    x-text="unreadCount"
                    class="inline-block h-fit rounded-full bg-lime-400 px-[0.5em] py-[0.1em] text-xs text-gray-800 dark:bg-lime-700 dark:text-gray-100">
                </span>
                <button title="Chat Options"
                    id="chatOptionsButton-{{ $chat->id }}"
                    x-ref="chatOptionsButton"
                    data-dropdown-target="chatOptions-{{ $chat->id }}"
                    x-on:click="e => {
                        e.stopPropagation()
                    }"
                    class="absolute right-0 top-0 cursor-pointer rounded bg-gray-100 text-gray-800 transition-all hover:bg-gray-300 hover:text-gray-600 group-hover:block sm:hidden dark:bg-gray-500 dark:text-gray-300">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 12H6.01M12.01 12H12.02M18.01 12H18.02" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Dropdown menu -->
    <div id="chatOptions-{{ $chat->id }}"
        wire:ignore
        x-ref="chatOptions"
        class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow-sm dark:bg-gray-800">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="chatOptionsButton-{{ $chat->id }}">
            <li>
                <button title="Pin chat"
                    x-on:click="e => {
                        e.stopPropagation()
                        $wire.togglePin()
                        optionsMenu.hide()
                    }"
                    x-text="isPinned ? 'Unpin chat' : 'Pin chat'"
                    class="block w-full px-4 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                </button>
            </li>
        </ul>
    </div>

</div>
