<x-chat-layout>
    <!-- Navbar -->
    

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
        <div id="chat-canvas-area" class="flex-1 overflow-y-scroll p-4">
            <x-chat.navigation>
                <x-slot:status>Online</x-slot:status>
            </x-chat.navigation>
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
                <x-chat.bubble-img><x-slot:text>This is the new office</x-slot:text></x-chat.bubble-img>
                <x-chat.bubble><x-slot:text>Message 6</x-slot:text></x-chat.bubble>
                <x-chat.bubble-img-multi><x-slot:text>This is the new office</x-slot:text></x-chat.bubble-img-multi>
                <x-chat.bubble dir="rtl"><x-slot:text>Message 5 👍</x-slot:text></x-chat.bubble>
                <x-chat.bubble><x-slot:text>Message 7</x-slot:text></x-chat.bubble>
                <x-chat.bubble-file dir="rtl"></x-chat.bubble-file>
                <x-chat.bubble-file></x-chat.bubble-file>

                <x-chat.bubble dir="rtl">
                    <x-slot:text>
                        Message 8 Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione quibusdam
                        soluta
                        optio
                        iure dignissimos velit consequatur quos nesciunt sunt quam?
                    </x-slot:text>
                    <x-slot:status>Sent</x-slot:status>
                </x-chat.bubble>

                <x-chat.bubble-img dir="rtl"><x-slot:text>This is the new office</x-slot:text><x-slot:status>Sent</x-slot:status></x-chat.bubble-img>
                <x-chat.bubble-img-multi dir="rtl"><x-slot:text>This is the new office</x-slot:text><x-slot:status>Sent</x-slot:status></x-chat.bubble-img-multi>
            </x-chat.canvas>
        </div>

        <!-- Fixed Bottom Bar for Input -->
        <x-chat.input-bar>Type a message...</x-chat.input-bar>

    </div>

</x-chat-layout>
