<div
    wire:transition.origin.left
    id="chat-messages"
    data-scroll-key="chat-messages-{{ $chat->id }}"
    class="h-full w-full flex-col justify-end space-y-4 overflow-y-scroll px-4 pt-4"
    x-data="scrollManager($el)"
    x-on:scroll="handleScroll($event); loadMoreMessages($event)"
    x-init="initScroll()"
    @transitionstart="initScroll()">

    <!-- Chat messages go here -->
    @foreach ($messages as $message)
        @livewire('chat.message', ['message' => $message], key('message-' . $message->id))
    @endforeach

</div>
