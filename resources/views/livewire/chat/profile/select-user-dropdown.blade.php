<div id="select-user-dropdown" class="z-10 overflow-hidden hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
        <div>Add Users to Group</div>
    </div>
    <div @member.updated="$refresh" class="py-2 text-sm text-gray-700 dark:text-gray-200 overflow-y-scroll" style="height: 16rem;" aria-labelledby="select-user-dropdown-button">
        @foreach ($users as $user)
        <div wire:key="{{ $user->id }}" class="w-full">
            <button wire:click="addMember({{ $user->id }})" type="button" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $user->name() }}</button>
        </div>
        @endforeach
    </div>

    @script
    <script>
        const $targetEl = document.getElementById('select-user-dropdown');

        const $triggerEl = document.getElementById('select-user-dropdown-button');

        const options = {
            placement: 'bottom-end',
            triggerType: 'click',
            offsetSkidding: 0,
            offsetDistance: 10,
            delay: 300,
            ignoreClickOutsideClass: false,
        };

        const instanceOptions = {
            id: 'select-user-dropdown-{{ $chat->group->id }}',
            override: true
        };

        new Dropdown($targetEl, $triggerEl, options, instanceOptions);
    </script>
    @endscript
</div>