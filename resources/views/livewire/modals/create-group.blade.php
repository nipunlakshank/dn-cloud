<!-- Add Group Modal -->
<div id="create-group-modal" tabindex="-1" aria-hidden="true" wire:ignore
    x-data="{ selectedUserIds: @entangle('selectedUserIds'), selectedUserCount: 0 }"
    x-init="() => {
        $watch('selectedUserIds', value => {
            selectedUserCount = value.length;
        });
    }"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
    <div class="relative max-h-full w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-4 md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create Group
                </h3>
                <button type="button"
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="create-group-modal">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <!-- Modal body -->
            <form wire:submit.prevent="createGroup" class="h-full p-4 md:p-5">
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Group Name
                        </label>
                        <input type="text" name="group-name" id="group-name" wire:model="name"
                            class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                            placeholder="Group Name" required />
                    </div>
                    <div class="col-span-2">

                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Avatar</label>
                        <input
                            class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                            id="file_input" type="file" accept="image/*" wire:model="avatar" />

                    </div>
                    <div class="col-span-2">
                        <div class="flex items-center gap-2">
                            <button id="selectUsersDropdownButton" data-dropdown-toggle="selectUsersDropdown"
                                class="inline-flex items-center rounded-lg bg-blue-700 px-4 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button"> Select Users <svg class="ms-2.5 h-2.5 w-2.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>

                            <span class="text-sm text-gray-500 dark:text-gray-300"
                                x-text="selectedUserCount + ' Selected'">
                            </span>
                        </div>

                        <!-- Select users -->
                        @livewire('dropdowns.select-users', ['users' => $users])

                    </div>
                    <div class="col-span-2">
                        <input id="is-wallet" type="checkbox" value="" wire:model="isWallet" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="is-wallet" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Is Wallet
                            <span class="inline-flex text-sm text-gray-400">( Check if this group is a 'Wallet' )</span>
                        </label>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="-ms-1 me-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>Create</span>
                </button>
            </form>
        </div>
    </div>
</div>