<div x-data="{ isGroup: @entangle('isGroup') }" id="profile-details" class="flex gap-4 py-4" wire:transition.origin.left>
    <button
        class="flex items-center rounded-lg border border-transparent bg-gray-100 text-gray-500 dark:bg-gray-700 dark:text-gray-300"
        type="button" onclick="deselectChat()">
        <svg class="h-5 w-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
        </svg>
    </button>
    <div class="flex gap-3"
        x-init="() => isGroup && $el.addEventListener('click', () => $dispatch('showProfile'))">
        <img class="relative h-10 w-10 rounded-full"
            src="{{ $chatAvatar }}" alt="Avatar">
        <div class="flex flex-col">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $chatName ?? 'Unknown' }}</span>
            <span class="text-sm font-light text-gray-900 dark:text-white">online</span>
        </div>
    </div>

    <!-- Profile Info Modal -->
    @livewire('chat.profile-info-modal', ['chat' => $chat], $chat->id)
</div>

