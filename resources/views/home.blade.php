<x-app-layout>
    <!-- Sidebar -->
    <x-chat.list>
        <x-chat.list-item>Chat 1</x-chat.list-item>
        <x-chat.list-item>Chat 2</x-chat.list-item>
        <x-chat.list-item>Chat 3</x-chat.list-item>
        <x-chat.list-item>Chat 4</x-chat.list-item>
        <x-chat.list-item>Chat 5</x-chat.list-item>
        <x-chat.list-item>Chat 6</x-chat.list-item>
        <x-chat.list-item>Chat 7</x-chat.list-item>
        <x-chat.list-item>Chat 8</x-chat.list-item>
        <x-chat.list-item>Chat 9</x-chat.list-item>
        <x-chat.list-item>Chat 10</x-chat.list-item>
        <x-chat.list-item>Chat 11</x-chat.list-item>
        <x-chat.list-item>Chat 12</x-chat.list-item>
        <x-chat.list-item>Chat 13</x-chat.list-item>
        <x-chat.list-item>Chat 14</x-chat.list-item>
    </x-chat.list>

    <!-- Main Content Area -->
    <div class="flex h-full flex-1 flex-col">
        <!-- Chat Content Scrollable Area -->
        <div class="flex-1 overflow-y-scroll p-4 pb-[50px]">
            <x-chat.canvas>
                <!-- Chat messages go here -->
                <x-chat.bubble>Message 1</x-chat.bubble>
                <x-chat.bubble>Message 2</x-chat.bubble>
                <x-chat.bubble>Message 3</x-chat.bubble>
                <x-chat.bubble>Message 4</x-chat.bubble>
                <x-chat.bubble>Message 5</x-chat.bubble>
                <x-chat.bubble>Message 6</x-chat.bubble>
                <x-chat.bubble>Message 7</x-chat.bubble>
            </x-chat.canvas>
        </div>

        <!-- Fixed Bottom Bar for Input -->
        <div class="fixed bottom-0 left-1/4 right-0 flex items-center  p-4">
            <x-chat.input-bar>Type a message...</x-chat.input-bar>
        </div>
    </div>
</x-app-layout>
