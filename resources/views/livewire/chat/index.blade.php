<div class="flex w-full border border-gray-100 dark:border-gray-900">
    <!-- Sidebar -->
    <div id="chat-sidebar"
        class="hidden w-full space-y-4 overflow-y-auto pb-4 text-white transition-transform md:block md:w-1/3">
        @livewire('chat.chat-list')
    </div>

    <!-- Chat Content Area -->
    <div id="chat-content" class="flex w-full" wire:key="chat-content-{{ auth()->id() }}">
        @if ($chat)
            <div class="flex w-full flex-col">
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
            <div class="flex h-full w-full items-center justify-center text-lg">
                <span class="text-gray-500 dark:text-gray-400">Select a chat to start messaging</span>
            </div>
        @endif
    </div>
</div>
