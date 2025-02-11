<aside aria-label="Sidebar"
    class="h-full border border-transparent border-r-gray-300 dark:border-r-gray-700">
    <div class="sticky top-0 z-10 flex justify-between gap-2 bg-gray-100 p-4 pt-6 dark:bg-gray-900">
        <x-chat.dropdown></x-chat.dropdown>
        <x-search-bar></x-search-bar>
    </div>

    {{-- Chat list --}}
    @livewire('chat.chat-list')

</aside>
