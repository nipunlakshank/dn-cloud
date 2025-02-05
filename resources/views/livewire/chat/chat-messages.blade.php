<div id="chat-canvas" scroll-key="chat-messages-{{ $chat->id }}-{{ $chat->lastMessage->id }}"
    wire:ignore.self
    wire:poll
    class="align-center relative h-full w-full flex-col justify-end space-y-4 overflow-y-scroll px-4 pt-4"
    x-data="scrollManager($el)" x-init="initScroll()"
    x-on:scroll="saveScroll($event)">

    <!-- Chat messages go here -->
    @foreach ($messages as $message)
        @livewire('chat.message', ['message' => $message], key('message-' . $message->id))
    @endforeach

</div>
