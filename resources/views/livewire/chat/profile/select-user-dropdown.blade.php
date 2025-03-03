<div id="select-user-dropdown"
    x-data="{}"
    x-init="() => {
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
            id: 'group-select-user-dropdown',
            override: true
        };
    
        new Dropdown($targetEl, $triggerEl, options, instanceOptions);
    }"
    class="z-10 hidden w-44 divide-y divide-gray-100 overflow-hidden rounded-lg bg-white shadow-sm dark:divide-gray-600 dark:bg-gray-700">
    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
        <div>Add Users to Group</div>
    </div>
    <div class="overflow-y-scroll py-2 text-sm text-gray-700 dark:text-gray-200" style="height: 16rem;"
        aria-labelledby="select-user-dropdown-button">
        @foreach ($users as $user)
            <div class="w-full"
                wire:key="user-add-to-group-{{ $user->id }}">
                <button wire:click="addMember({{ $user->id }})" type="button"
                    class="block w-full px-4 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $user->name() }}</button>
            </div>
        @endforeach
    </div>
</div>

