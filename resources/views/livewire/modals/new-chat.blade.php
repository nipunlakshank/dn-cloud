<div id="new-chat-modal" tabindex="-1" aria-hidden="true"
    class="fixed inset-0 z-50 hidden items-center justify-center overflow-x-hidden">
    <div class="relative w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative flex h-full flex-col rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between rounded-t border-b bg-white p-4 md:p-5 dark:border-gray-600 dark:bg-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    New Chat
                </h3>
                <button type="button"
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="new-chat-modal">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="flex h-full flex-col p-4 md:p-5"
                x-data="{
                    search: '',
                    users: @entangle('users'),
                    get filteredUsers() {
                        return this.users.filter(user =>
                            user.name.toLowerCase().includes(this.search.toLowerCase()) ||
                            user.email.toLowerCase().includes(this.search.toLowerCase())
                        );
                    }
                }">

                <!-- Search bar -->
                <div class="mb-5">
                    <input type="text" x-model="search"
                        class="w-full rounded-lg border border-gray-300 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Search users..." />
                </div>

                <!-- User list -->
                <ul class="max-h-[50vh] flex-1 divide-y divide-gray-200 overflow-y-auto dark:divide-gray-600">
                    <template x-for="user in filteredUsers" :key="user.id">
                        <li class="pb-1 sm:pb-2">
                            <div tabindex=0
                                data-modal-toggle="new-chat-modal"
                                x-on:click="$wire.startChat(user.id)"
                                class="flex cursor-pointer items-center space-x-4 rounded p-2 focus-within:outline-none rtl:space-x-reverse hover:dark:bg-gray-800 focus-visible:dark:bg-gray-800">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full"
                                        :src="user.avatar_url"
                                        :alt="user.name + ' Avatar'">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-medium text-gray-900 dark:text-white"
                                        x-text="user.name"></p>
                                    <p class="truncate text-sm text-gray-500 dark:text-gray-400" x-text="user.email">
                                    </p>
                                </div>
                            </div>
                        </li>
                    </template>

                    <!-- Show message if no users match -->
                    <li class="p-4 text-center text-gray-500 dark:text-gray-400" x-show="filteredUsers.length === 0">
                        No users found.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
