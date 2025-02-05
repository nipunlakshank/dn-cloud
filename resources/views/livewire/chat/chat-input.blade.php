<div class="w-full">
    <form wire:submit.prevent="sendMessage">
        <label for="chat" class="sr-only">Your message</label>
        <div class="flex items-center rounded-lg bg-gray-50 px-3 py-2 dark:bg-gray-700">

            <button id="attachment-menu-button" data-dropdown-toggle="attachment-menu"
                data-dropdown-placement="bottom-start" type="button"
                class="inline-flex cursor-pointer justify-center rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM13 7.75699C13 7.2047 12.5523 6.75699 12 6.75699C11.4477 6.75699 11 7.2047 11 7.75699V11H7.75699C7.2047 11 6.75699 11.4477 6.75699 12C6.75699 12.5523 7.2047 13 7.75699 13H11V16.243C11 16.7953 11.4477 17.243 12 17.243C12.5523 17.243 13 16.7953 13 16.243V13H16.243C16.7953 13 17.243 12.5523 17.243 12C17.243 11.4477 16.7953 11 16.243 11H13V7.75699Z"
                        fill="currentColor" />
                </svg>
                <span class="sr-only">Attachment Menu</span>
            </button>

            <!-- Chat Attachment Popup Menu -->
            <x-chat.attachment-menu></x-chat.attachment-menu>

            <textarea id="message-text"
                rows="1"
                wire:model="text"
                x-init="() => { $el.focus(); }"
                x-on:keydown.enter="if (event.shiftKey) return; event.preventDefault(); $wire.sendMessage()"
                x-on:keyup.escape="event => { event.stopPropagation(); $el.blur(); }"
                style="field-sizing: content;"
                class="mx-4 box-content block max-h-[15ch] min-h-[2ch] w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                placeholder="Your message..."></textarea>
            <button type="submit"
                class="inline-flex cursor-pointer justify-center rounded-full p-2 text-blue-600 hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                <svg class="h-5 w-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 18 20">
                    <path
                        d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                </svg>
                <span class="sr-only">Send message</span>
            </button>
        </div>
    </form>
</div>
