<div
    wire:poll="loadChats"
    class="flex flex-col gap-1 px-1 py-1 md:gap-2 lg:px-2">
    @foreach ($chats as $chat)
        @livewire('chat.chat-card', ['chat' => $chat], key('chat-card-' . $chat->id))
    @endforeach
</div>
