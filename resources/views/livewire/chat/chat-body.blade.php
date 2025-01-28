<div id="chat-canvas" key="some-unique-key"
    class="align-center relative h-full w-full flex-col justify-end space-y-4 overflow-y-scroll px-4 pt-4"
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

    <!-- Chat Attachment modals (Image / Document / Daily reports) -->
    <x-chat.attachment-modal></x-chat.attachment-modal>
</div>
