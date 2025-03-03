<div style="width:30rem; height: 20rem;">
    <div
        class="font-small flex h-full w-full flex-col gap-3 overflow-y-auto text-sm text-gray-500 md:mb-0 md:me-4 dark:text-gray-400">
        @foreach ($chatMembers as $member)
            <div wire:key="chat-info-member-{{ $member->id }}"
                class="inline-flex w-full items-center rounded-lg bg-gray-100 px-3 py-2 text-gray-900 dark:bg-gray-700 dark:text-white">
                <span class="w-full">{{ $member->name() }}</span>
                @if (Auth::user()->id == $member->id)
                    <span class="self-center py-2 text-center text-green-500">You</span>
                @endif
                @can('removeUser', [$chat->group, $member->id])
                    <button type="button" wire:click="removeMember({{ $member }})"
                        class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-200 text-sm text-gray-900 hover:bg-red-500 hover:text-gray-100 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-red-500 dark:hover:text-white">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                @endcan
            </div>
        @endforeach
    </div>
</div>
