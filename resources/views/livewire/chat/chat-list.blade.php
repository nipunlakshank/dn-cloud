<aside id="chat-sidebar" aria-label="Sidebar" class="relative">
    <div class="sticky top-0 flex justify-between gap-2 bg-gray-100 p-4 pt-6 dark:bg-gray-900">
        <x-chat.dropdown></x-chat.dropdown>
        <x-search-bar></x-search-bar>
    </div>
    <div class="flex flex-col space-y-2 overflow-y-auto px-3 py-1">
        {{-- Chat list items --}}
        <x-chat.list-item>
            <x-slot:chatName>John Doe</x-slot:chatName>
            <x-slot:lastMessage>Message 1 Lorem ipsum dolor sit amet.</x-slot:lastMessage>
            <x-slot:time>11:46</x-slot:time>
        </x-chat.list-item>

        <!-- Additional chat list items -->
        @foreach (range(2, 14) as $i)
            <x-chat.list-item>
                <x-slot:lastMessage>Message {{ $i }} Lorem ipsum dolor sit amet.</x-slot:lastMessage>
            </x-chat.list-item>
        @endforeach
    </div>
</aside>
