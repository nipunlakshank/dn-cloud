<x-app-layout>
    <!-- Navbar -->
    <aside id="chat-sidebar"
        class="h-full w-1/4 space-y-4 overflow-hidden text-white transition-transform max-[990px]:w-fit max-sm:absolute max-sm:z-50 max-sm:w-3/4 max-sm:-translate-x-full">
        <div class="h-full overflow-y-hidden bg-gray-50 px-3 py-4 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li class="group">
                    <a href="/dashboard"
                        class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <svg class="font-in h-5 w-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span
                            class="ms-3 flex-1 whitespace-nowrap sm:max-[990px]:hidden group-hover:sm:max-[990px]:absolute group-hover:sm:max-[990px]:left-10 group-hover:sm:max-[990px]:z-50 group-hover:sm:max-[990px]:mb-3 group-hover:sm:max-[990px]:flex group-hover:sm:max-[990px]:rounded-lg group-hover:sm:max-[990px]:bg-gray-400 group-hover:max-[990px]:sm:py-2 group-hover:sm:max-[990px]:px-3 group-hover:sm:max-[990px]:text-[12px] group-hover:sm:max-[990px]:text-gray-100 group-hover:sm:dark:max-[990px]:bg-gray-100 group-hover:sm:max-[990px]:dark:text-gray-900">Dashboard</span>
                    </a>
                </li>
                @if (false)
                <li class="group">
                    <a href="/reports"
                        class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span
                            class="ms-3 flex-1 whitespace-nowrap sm:max-[990px]:hidden group-hover:sm:max-[990px]:absolute group-hover:sm:max-[990px]:left-10 group-hover:sm:max-[990px]:z-50 group-hover:sm:max-[990px]:mb-3 group-hover:sm:max-[990px]:flex group-hover:sm:max-[990px]:rounded-lg group-hover:sm:max-[990px]:bg-gray-400 group-hover:max-[990px]:sm:py-2 group-hover:sm:max-[990px]:px-3 group-hover:sm:max-[990px]:text-[12px] group-hover:sm:max-[990px]:text-gray-100 group-hover:sm:dark:max-[990px]:bg-gray-100 group-hover:sm:max-[990px]:dark:text-gray-900">Reports</span>

                    </a>
                </li>
                @endif
                <li class="group">
                    <a href="/chat"
                        class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <svg
                            class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3 6C3 4.89543 3.89543 4 5 4H19C20.1046 4 21 4.89543 21 6V15C21 16.1046 20.1046 17 19 17L12.3837 17L9.50345 19.5923C8.53816 20.461 7 19.776 7 18.4773V17H5C3.89543 17 3 16.1046 3 15V6ZM7 8C6.44772 8 6 8.44772 6 9C6 9.55228 6.44772 10 7 10H12C12.5523 10 13 9.55228 13 9C13 8.44772 12.5523 8 12 8H7ZM15 8C14.4477 8 14 8.44772 14 9C14 9.55228 14.4477 10 15 10H17C17.5523 10 18 9.55228 18 9C18 8.44772 17.5523 8 17 8H15ZM7 11C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H9C9.55228 13 10 12.5523 10 12C10 11.4477 9.55228 11 9 11H7ZM12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H12Z"
                                fill="currentColor" />
                        </svg>
                        <span
                            class="ms-3 flex-1 whitespace-nowrap sm:max-[990px]:hidden group-hover:sm:max-[990px]:absolute group-hover:sm:max-[990px]:left-10 group-hover:sm:max-[990px]:z-50 group-hover:sm:max-[990px]:mb-3 group-hover:sm:max-[990px]:flex group-hover:sm:max-[990px]:rounded-lg group-hover:sm:max-[990px]:bg-gray-400 group-hover:max-[990px]:sm:py-2 group-hover:sm:max-[990px]:px-3 group-hover:sm:max-[990px]:text-[12px] group-hover:sm:max-[990px]:text-gray-100 group-hover:sm:dark:max-[990px]:bg-gray-100 group-hover:sm:max-[990px]:dark:text-gray-900">Chat</span>
                    </a>
                </li>
                <li class="group">
                    <button data-modal-target="profile-update-modal" data-modal-toggle="profile-update-modal"
                        class="group flex w-full items-center rounded-lg p-2 text-start text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <svg
                            class="h-6 w-6 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5 8C5 5.79086 6.79086 4 9 4C11.2091 4 13 5.79086 13 8C13 8.44133 12.9285 8.86597 12.7965 9.26297L10.263 11.7965C9.86597 11.9285 9.44133 12 9 12C6.79086 12 5 10.2091 5 8ZM9.05949 13H7C4.79086 13 3 14.7909 3 17V18C3 19.1046 3.89543 20 5 20H7.17157C6.99406 19.4979 6.95065 18.9499 7.05823 18.4118L7.73245 15.0397C7.84859 14.4589 8.13407 13.9254 8.55291 13.5066L9.05949 13Z"
                                fill="currentColor" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.0922 8C17.7103 8 17.3321 8.07524 16.9793 8.22142C16.6266 8.36757 16.3059 8.58192 16.036 8.85194L9.96712 14.9208C9.82751 15.0604 9.73235 15.2382 9.69364 15.4318L9.01941 18.8039C8.95386 19.1318 9.05648 19.4707 9.29289 19.7071C9.5293 19.9435 9.86822 20.0461 10.1961 19.9806L13.5682 19.3064C13.7618 19.2677 13.9396 19.1725 14.0792 19.0329L20.1482 12.9639C20.4182 12.6939 20.6324 12.3734 20.7786 12.0207C20.9248 11.6679 21 11.2897 21 10.9078C21 10.5259 20.9248 10.1478 20.7786 9.79499C20.6324 9.44219 20.4181 9.12164 20.1481 8.85166C19.8781 8.5817 19.5577 8.36754 19.205 8.22142C18.8522 8.07524 18.474 8 18.0922 8Z"
                                fill="currentColor" />
                        </svg>
                        <span
                            class="ms-3 flex-1 whitespace-nowrap sm:max-[990px]:hidden group-hover:sm:max-[990px]:absolute group-hover:sm:max-[990px]:left-10 group-hover:sm:max-[990px]:z-50 group-hover:sm:max-[990px]:mb-3 group-hover:sm:max-[990px]:flex group-hover:sm:max-[990px]:rounded-lg group-hover:sm:max-[990px]:bg-gray-400 group-hover:max-[990px]:sm:py-2 group-hover:sm:max-[990px]:px-3 group-hover:sm:max-[990px]:text-[12px] group-hover:sm:max-[990px]:text-gray-100 group-hover:sm:dark:max-[990px]:bg-gray-100 group-hover:sm:max-[990px]:dark:text-gray-900">Profile</span>
                    </button>
                </li>
                @can('create', App\Models\User::class)
                <li class="group">
                    <button
                        type="button"
                        @click="$dispatch('open-registration-modal')"
                        class="group flex w-full items-center rounded-lg p-2 text-start text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span
                            class="ms-3 flex-1 whitespace-nowrap sm:max-[990px]:hidden group-hover:sm:max-[990px]:absolute group-hover:sm:max-[990px]:left-10 group-hover:sm:max-[990px]:z-50 group-hover:sm:max-[990px]:mb-3 group-hover:sm:max-[990px]:flex group-hover:sm:max-[990px]:rounded-lg group-hover:sm:max-[990px]:bg-gray-400 group-hover:max-[990px]:sm:py-2 group-hover:sm:max-[990px]:px-3 group-hover:sm:max-[990px]:text-[12px] group-hover:sm:max-[990px]:text-gray-100 group-hover:sm:dark:max-[990px]:bg-gray-100 group-hover:sm:max-[990px]:dark:text-gray-900">User
                            Registration</span>
                    </button>
                </li>
                @endcan
                <li class="group">
                    <button
                        type="button"
                        x-data="{logoutModal:null}"
                        x-on:click="$dispatch('show-logout-modal')"
                        class="group flex w-full items-center rounded-lg p-2 text-start text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <svg
                            class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            width="5" height="5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4 12L16 12M4 12L8 16M4 12L8 8M15 4H17C18.6569 4 20 5.34315 20 7V17C20 18.6569 18.6569 20 17 20H15"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span
                            class="ms-3 flex-1 whitespace-nowrap sm:max-[990px]:hidden group-hover:sm:max-[990px]:absolute group-hover:sm:max-[990px]:left-10 group-hover:sm:max-[990px]:z-50 group-hover:sm:max-[990px]:mb-3 group-hover:sm:max-[990px]:flex group-hover:sm:max-[990px]:rounded-lg group-hover:sm:max-[990px]:bg-gray-400 group-hover:max-[990px]:sm:py-2 group-hover:sm:max-[990px]:px-3 group-hover:sm:max-[990px]:text-[12px] group-hover:sm:max-[990px]:text-gray-100 group-hover:sm:dark:max-[990px]:bg-gray-100 group-hover:sm:max-[990px]:dark:text-gray-900">
                            Sign Out
                        </span>
                    </button>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex h-full w-full overflow-hidden p-6">

        <!-- Dashboard table Area -->
        <div class="flex h-full w-full flex-row justify-center gap-6 overflow-hidden align-top max-sm:flex-col">
            @can('viewAny', App\Models\Wallet::class)
            <x-wallets-table :wallets="$wallets"></x-wallets-table>
            @endcan
            @can('viewAny', App\Models\User::class)
            <x-users-table :users="$users"></x-users-table>
            @endcan
        </div>

    </div>

    <!-- User Registration -->
    @livewire('auth.register-form')

    <!-- Logout -->
    <x-settings.logout></x-settings.logout>
</x-app-layout>