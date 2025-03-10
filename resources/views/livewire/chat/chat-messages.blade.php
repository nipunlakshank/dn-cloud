<div
    wire:transition.origin.left
    id="chat-messages"
    data-scroll-key="chat-messages-{{ $chat->id }}"
    class="h-full w-full flex-col justify-end space-y-4 overflow-y-auto px-4 pt-4"
    x-data="scrollManager($el)"
    x-on:scroll="handleScroll($event); loadMoreMessages($event)"
    x-init="() => {
        initScroll();
        $wire.markChatAsRead();
    }"
    @transitionstart="initScroll()">

    @foreach ($messages as $message)
        @livewire('chat.message', ['message' => $message], key('chat-message-' . $message->id))
    @endforeach

</div>
