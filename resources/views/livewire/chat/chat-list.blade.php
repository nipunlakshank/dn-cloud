<aside aria-label="Sidebar"
    class="h-full border border-transparent border-r-gray-300 dark:border-r-gray-700">
    <div class="sticky top-0 z-10 flex justify-between gap-2 bg-gray-100 p-4 pt-6 dark:bg-gray-900">
        <x-chat.dropdown></x-chat.dropdown>
        <x-search-bar></x-search-bar>
    </div>

    {{-- Chat list --}}
    <div class="flex flex-col gap-1 px-1 py-1 md:gap-2 lg:px-2" wire:key="chat-list-{{ auth()->id() }}">
        @foreach ($chats as $chat)
            @livewire('chat.chat-card', ['chat' => $chat], key('chat-card-' . $chat->id))
        @endforeach
    </div>
</aside>
