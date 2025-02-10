<div class="flex w-full border border-gray-100 dark:border-gray-900">
    <!-- Sidebar -->
    <div id="chat-sidebar" wire:key="chat-sidebar-{{ auth()->id() }}"
        class="{{ $chat ? 'hidden' : 'block' }} w-full gap-4 overflow-y-auto pb-4 text-white transition-transform sm:block sm:w-[45%] md:w-1/2 lg:w-2/5">
        @livewire('chat.chat-sidebar')
    </div>

    <!-- Chat Content Area -->
    <div id="chat-container" class="{{ $chat ? 'flex' : 'hidden' }} w-full sm:flex">
        @if ($chat)
            <div id="chat-content"
                class="flex w-full flex-col"
                wire:key="chat-content-{{ auth()->id() }}">
                <!-- Top Bar with Status -->
                <div class="w-full border-none bg-gray-200 px-4 dark:bg-gray-800">
                    @livewire('chat.chat-header', ['chat' => $chat], key('chat-header-' . $chat->id))
                </div>

                <!-- Chat-Canvas -->
                @livewire('chat.chat-messages', ['chat' => $chat], key('chat-messages-' . $chat->id))

                <!-- Bottom Bar for Input -->
                <div class="sticky bottom-0 flex items-center bg-gray-100 p-2 dark:bg-gray-900">
                    @livewire('chat.chat-input', ['chat' => $chat], key('chat-input-' . $chat->id))
                </div>
            </div>
        @else
            <div class="flex h-full w-full items-center justify-center text-lg"
                wire:transition
                wire:key="chat-not-selected-{{ auth()->id() }}">
                <span class="text-gray-500 dark:text-gray-400">{{ __('Select a chat to start messaging') }}</span>
            </div>
        @endif
    </div>
</div>
