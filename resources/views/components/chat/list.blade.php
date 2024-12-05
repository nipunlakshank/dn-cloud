<aside id="chat-sidebar"
    class="relative hidden h-full w-full space-y-4 overflow-y-auto pb-4 text-white transition-transform lg:block lg:w-1/4"
    aria-label="Sidebar">
    <div class="sticky top-0 flex justify-between gap-2 bg-gray-100 p-4 pt-6 dark:bg-gray-900">
        <x-chat.dropdown></x-chat.dropdown>
        <x-search-bar></x-search-bar>
    </div>
    <div class="flex flex-col space-y-4 overflow-y-auto px-3">
        <ul class="space-y-2 font-medium">
            {{-- Chat list items --}}
            {{ $slot }}
        </ul>
    </div>
</aside>
