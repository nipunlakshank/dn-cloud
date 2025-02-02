<div class="flex w-full border border-gray-100 dark:border-gray-900">
    <!-- Sidebar -->
    <div id="chat-sidebar"
        class="hidden w-full space-y-4 overflow-y-auto pb-4 text-white transition-transform md:block md:w-1/3">
        @livewire('chat.chat-list')
    </div>

    <!-- Chat Content Area -->
    <div id="chat-content" class="flex w-full flex-col">

        <!-- Top Bar with Status -->
        <div class="w-full border-none bg-gray-200 px-4 dark:bg-gray-800">
            <x-chat.topbar>
                <x-slot:status>Online</x-slot:status>
            </x-chat.topbar>
        </div>

        <!-- Chat-Canvas -->
        @livewire('chat.chat-content', ['chat' => $chat])

        <!-- Bottom Bar for Input -->
        <div class="sticky bottom-0 flex items-center bg-gray-100 p-2 dark:bg-gray-900">
            @livewire('chat.chat-input')
        </div>
    </div>
</div>
