<x-chat-layout>
    <!-- Navbar -->
    <!-- Add your navbar component here -->

    <!-- Sidebar -->
    <x-chat.list>
        <!-- Chat List Items -->
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
    </x-chat.list>

    <!-- Main Content Area -->
    <div id="chat-content" class="flex h-full flex-1 flex-col pb-[90px] pt-[50px] lg:pt-10">
        <!-- Top Bar with Status -->
        <x-chat.topbar>
            <x-slot:status>Online</x-slot:status>
        </x-chat.topbar>

        <!-- Chat Content Scrollable Area -->
        <div id="chat-canvas-area" key="some-unique-key" class="flex-1 overflow-y-scroll p-4"
            x-data="scrollManager($el)" x-init="initScroll()" x-on:scroll="saveScroll($event)">
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

                <!-- Additional chat bubbles -->
                @foreach (range(2, 8) as $i)
                    <x-chat.bubble dir="{{ $i % 2 == 0 ? 'rtl' : 'ltr' }}">
                        <x-slot:text>Message {{ $i }}</x-slot:text>
                    </x-chat.bubble>
                @endforeach

                <!-- Image and file bubbles -->
                <x-chat.bubble-img>
                    <x-slot:text>This is the new office</x-slot:text>
                </x-chat.bubble-img>
                <x-chat.bubble-img-multi>
                    <x-slot:text>This is the new office</x-slot:text>
                </x-chat.bubble-img-multi>
                <x-chat.bubble-file dir="rtl"></x-chat.bubble-file>
                <x-chat.bubble-file></x-chat.bubble-file>
            </x-chat.canvas>
        </div>

        <!-- Fixed Bottom Bar for Input -->
        <x-chat.input-bar>Type a message...</x-chat.input-bar>
    </div>
</x-chat-layout>
