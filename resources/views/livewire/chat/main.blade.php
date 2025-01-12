<div class="flex w-full border border-gray-100 dark:border-gray-900">
    <!-- Sidebar -->
    <div class="hidden w-full space-y-4 overflow-y-auto pb-4 text-white transition-transform lg:block lg:w-1/3">
        @livewire('chat.chat-list')
    </div>

    <!-- Chat Content Area -->
    <div id="chat-canvas-area" key="some-unique-key" class="flex w-full flex-col">

        <!-- Top Bar with Status -->
        <div class="w-full border-none bg-gray-200 px-4 lg:left-1/4 dark:bg-gray-800">
            <x-chat.topbar>
                <x-slot:status>Online</x-slot:status>
            </x-chat.topbar>
        </div>

        <!-- Chat-Canvas -->
        <div class="align-center relative w-full flex-col justify-end space-y-4 overflow-y-scroll px-4 py-2"
            x-data="scrollManager($el)" x-init="initScroll()"
            x-on:scroll="saveScroll($event)">
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

        <!-- Bottom Bar for Input -->
        <div class="sticky bottom-0 flex items-center bg-gray-100 p-4 dark:bg-gray-900">
            @livewire('chat.chat-input')
        </div>
    </div>
</div>
