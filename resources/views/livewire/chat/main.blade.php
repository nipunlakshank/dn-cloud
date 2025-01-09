<div class="flex w-full border border-gray-100 dark:border-gray-900">
    @livewire('chat.chat-list')

    <!-- Top Bar with Status -->
    <x-chat.topbar>
        <x-slot:status>Online</x-slot:status>
    </x-chat.topbar>

    <!-- Chat Content Scrollable Area -->
    <div id="chat-canvas-area" key="some-unique-key" class="flex-1 overflow-y-scroll p-4 py-8"
        x-data="scrollManager($el)" x-init="initScroll()"
        x-on:scroll="saveScroll($event)">
        <!-- Canvas -->
        <div class="align-center relative w-full flex-col justify-end space-y-4 py-14">
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
        </div>

        <!-- Fixed Bottom Bar for Input -->
        @livewire('chat.chat-box')
    </div>
</div>
