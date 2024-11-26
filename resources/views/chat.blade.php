<x-chat-layout>
    <!-- Control bar -->
    <div class="fixed left-0 top-0 z-30 w-full border-none bg-gray-200 px-4 dark:bg-gray-800">
        <div class="flex items-center justify-between p-4">
            <div class="items flex">
                <button class="flex items-center lg:hidden" type="button">
                    <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

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
    <div class="flex h-full flex-1 flex-col pb-[90px] pt-[50px] lg:pt-10">
        <!-- Chat Content Scrollable Area -->
        <div class="flex-1 overflow-y-scroll p-4 pb-[50px]">
            <x-chat.canvas>
                <!-- Chat messages go here -->
                <x-chat.bubble>
                    <x-slot:name>John Doe</x-slot:name>
                    <x-slot:time>11:46</x-slot:time>
                    <x-slot:status>Delivered</x-slot:status>
                    <x-slot:text>
                        Message 1 Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione quibusdam soluta
                        optio iure dignissimos velit consequatur quos nesciunt sunt quam?
                    </x-slot:text>
                    <x-slot:type>text</x-slot:type>
                </x-chat.bubble>

                <x-chat.bubble dir="rtl"><x-slot:text>Message 2</x-slot:text></x-chat.bubble>
                <x-chat.bubble><x-slot:text>Message 3</x-slot:text></x-chat.bubble>
                <x-chat.bubble dir="ltr"><x-slot:text>👍</x-slot:text></x-chat.bubble>
                <x-chat.bubble><x-slot:text>Message 6</x-slot:text></x-chat.bubble>
                <x-chat.bubble dir="rtl"><x-slot:text>Message 5 👍</x-slot:text></x-chat.bubble>
                <x-chat.bubble><x-slot:text>Message 7</x-slot:text></x-chat.bubble>

                <x-chat.bubble dir="rtl">
                    <x-slot:text>
                        Message 8 Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione quibusdam soluta
                        optio
                        iure dignissimos velit consequatur quos nesciunt sunt quam?
                    </x-slot:text>
                    <x-slot:status>Sent</x-slot:status>
                </x-chat.bubble>

            </x-chat.canvas>
        </div>

        <!-- Fixed Bottom Bar for Input -->
        <div class="fixed bottom-0 left-0 right-0 flex items-center p-4 lg:left-1/4">
            <x-chat.input-bar>Type a message...</x-chat.input-bar>
        </div>
    </div>
</x-chat-layout>
