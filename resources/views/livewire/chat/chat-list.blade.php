<aside aria-label="Sidebar">
    <div class="sticky top-0 z-10 flex justify-between gap-2 bg-gray-100 p-4 pt-6 dark:bg-gray-900">
        <x-chat.dropdown></x-chat.dropdown>
        <x-search-bar></x-search-bar>
    </div>

    {{-- Chat list --}}
    <div class="flex flex-col gap-1 overflow-y-auto px-1 py-1 md:gap-2 lg:px-2">
        @livewire('chat.chat-card', [
            'chatName' => 'John Doe',
            'lastMessage' => 'Message 1 Lorem ipsum dolor sit amet.',
            'time' => '11:46',
        ])

        <!-- Additional chat list items -->
        @foreach (range(2, 14) as $i)
            @livewire('chat.chat-card')
        @endforeach
    </div>
