<aside id="logo-sidebar" class="relative h-full pb-4 w-full lg:w-1/4 space-y-4 overflow-y-auto text-white transition-transform hidden lg:block"
    aria-label="Sidebar">
    <div class="p-4 sticky top-0 bg-gray-100 dark:bg-gray-900">
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
