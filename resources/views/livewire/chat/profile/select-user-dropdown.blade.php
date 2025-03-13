<div id="select-user-dropdown"
    x-data="{
        users: @entangle('users'),
        userListDropdown: null
    }"
    x-init="() => {
        const $targetEl = document.getElementById('select-user-dropdown')
        const $triggerEl = document.getElementById('select-user-dropdown-button')
    
        const options = {
            placement: 'bottom-end',
            triggerType: 'click',
            offsetSkidding: 0,
            offsetDistance: 10,
            ignoreClickOutsideClass: false,
        }
    
        const instanceOptions = {
            id: 'group-select-user-dropdown-{{ $chat->id }}',
            override: true
        }
    
        userListDropdown = new Dropdown($targetEl, $triggerEl, options, instanceOptions)
    }"
    x-bind:class="{ 'h-fit': users.length > 0, 'h-[30%]': users.length === 0 }"
    class="z-10 hidden max-h-[50%] min-h-[30%] w-fit max-w-full divide-y divide-gray-100 overflow-hidden rounded-lg bg-white shadow-sm dark:divide-gray-600 dark:bg-gray-700">
    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
        <span>Add Users to Group</span>
    </div>
    <div class="h-full overflow-y-scroll py-2 text-sm text-gray-700 dark:text-gray-200"
        aria-labelledby="select-user-dropdown-button">
        <template x-for="user in users" :key="user.id">
            <div class="w-full">
                <button
                    x-on:click="() => {
                        $wire.addMember(user.id)
                        userListDropdown.hide()
                    }"
                    type="button"
                    class="flex w-full flex-col px-4 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    <span x-text="user.name" class="text-sm"></span>
                    <span x-text="user.email" class="text-xs"></span>
                </button>
            </div>
        </template>
        <template x-if="users.length === 0">
            <div class="flex h-[80%] w-full items-center justify-center">
                <span class="text-xs text-gray-500 dark:text-gray-400">No users left</span>
            </div>
        </template>
    </div>
</div>
