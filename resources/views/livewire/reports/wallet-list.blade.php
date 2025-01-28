<aside aria-label="Sidebar" class="relative">
    <div class="sticky top-0 flex justify-between gap-2 bg-gray-100 p-4 pt-6 dark:bg-gray-900">
        <x-chat.dropdown></x-chat.dropdown>
        <x-search-bar></x-search-bar>
    </div>
    {{-- Chat list --}}
    <div class="flex flex-col space-y-1 overflow-y-auto px-1 py-1 md:space-y-2 lg:px-2">
        {{-- Chat list items --}}
       <x-wallets.list-item><x-slot:chatName>Wallet 2</x-slot:chatName></x-wallets.list-item>
    </div>
</aside>
