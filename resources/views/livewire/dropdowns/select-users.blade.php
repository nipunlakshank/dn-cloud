<div
    x-data="{
        users: @entangle('users'),
        search: '',
        get filteredUsers() {
            return this.users.filter(user =>
                user.name.toLowerCase().includes(this.search.toLowerCase()) ||
                user.email.toLowerCase().includes(this.search.toLowerCase())
            );
        },
        selectedUsers: new Set(),
        addUser(id) {
            this.selectedUsers.add(id)
        },
        removeUser(id) {
            this.selectedUsers.delete(id)
        },
        isSelected(id) {
            return this.selectedUsers.has(id)
        },
    }"
    id="selectUsersDropdown"
    class="z-10 hidden w-fit min-w-60 max-w-80 rounded-lg bg-white shadow dark:bg-gray-700">
    <div class="p-3">
        <label for="input-group-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" id="input-group-search"
                x-model="search"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                placeholder="Search users...">
        </div>
    </div>
    <ul class="h-48 overflow-y-auto px-3 pb-3 text-sm text-gray-700 dark:text-gray-200"
        aria-labelledby="selectUsersDropdownButton">

        <template x-for="user in filteredUsers" :key="user.id">
            <li>
                <div
                    x-on:click="() => {
                        if (isSelected(user.id)) {
                            removeUser(user.id)
                            $wire.dispatch('group.removeUser', {id: user.id});
                        } else {
                            addUser(user.id);
                            $wire.dispatch('group.addUser', {id: user.id});
                        }
                    }"
                    class="flex items-center rounded p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input :id="'user-' + user.id" type="checkbox"
                        :value="user.id"
                        :checked="isSelected(user.id)"
                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                    <div
                        class="ms-2 flex w-full flex-col gap-1 rounded text-sm font-medium text-gray-900 dark:text-gray-300">
                        <span x-text="user.name"></span>
                        <span x-text="user.email"></span>
                    </div>
                </div>
            </li>
        </template>
    </ul>
    <div
        x-data="{
            get selectedCount() {
                return 'Selected: ' + selectedUsers.size;
            },
        }"
        class ="flex items-center justify-between gap-1 rounded-b-lg border-t border-gray-200 bg-gray-50 p-3 text-sm font-medium dark:border-gray-600 dark:bg-gray-700">
        <span
            class="cursor-pointer text-red-600 hover:bg-gray-100 hover:underline dark:text-red-500 dark:hover:bg-gray-600"
            x-on:click="() => {
                selectedUsers.clear()
                $wire.dispatch('group.clearSelectedUsers');
            }">
            Clear
        </span>
        <span class="text-sm text-gray-500 dark:text-gray-300" x-text="selectedCount"></span>
    </div>
</div>
