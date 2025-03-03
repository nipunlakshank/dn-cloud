<div style="width:30rem; height: 20rem;">
    <div class="w-full max-h-60 flex flex-col gap-3 text-sm font-small text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
        @foreach ($chatMembers as $member)
        <div wire:key={{ $member->id }} class="w-full inline-flex items-center px-3 py-2 rounded-lg text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-white">
            <p class="w-full">
                {{ $member->name() }}
            </p>
            @if (Auth::user()->id == $member->id)
            <span class="text-green-500 py-2 text-center self-center">You</span>
            @else
            <button type="button" wire:click="removeMember({{ $member->id }},{{ $chat->id  }})" class="w-8 bg-gray-200 text-gray-900 hover:bg-red-500 hover:text-gray-100 rounded-full text-sm h-8 ms-auto inline-flex justify-center items-center dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-red-500 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
            @endif
        </div>
        @endforeach
        <div>
            <button id="select-user-dropdown-button" type="button" data-dropdown-toggle="user-select-dropdown" class="inline-flex items-center px-3 py-2 mb-4 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600">
                <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                </svg>
                Add Members
            </button>

            <!-- Select users -->
            @livewire('chat.profile.select-user-dropdown',['chat'=>$chat],$chat->group->id)

        </div>
    </div>
</div>