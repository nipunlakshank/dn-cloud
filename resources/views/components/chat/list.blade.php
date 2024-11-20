<aside id="logo-sidebar" class="h-full w-1/4 space-y-4 overflow-y-auto text-white transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="p-4">
        <h2 class="text-xl font-semibold">Chats</h2>
    </div>
    <div class="flex flex-col space-y-4 overflow-y-auto px-3">
        <ul class="space-y-2 font-medium">
            {{-- Chat list items --}}
            {{ $slot }}
        </ul>
    </div>
</aside>
