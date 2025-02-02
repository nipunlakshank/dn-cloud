<nav x-data="{ open: false }"
    class="fixed left-0 top-0 z-50 w-full border-b border-gray-200 bg-gray-800 p-4 text-white dark:border-gray-700 dark:bg-gray-800">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="drawer-navigation" aria-controls="drawer-navigation"
                    data-drawer-show="drawer-navigation" type="button"
                    class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ Auth::guest() ? '/' : '/chat' }}" class="ms-2 flex md:me-24">
                    <x-application-logo class="h-[50px] w-[50px]"></x-application-logo>
                    <span class="self-center whitespace-nowrap text-xl font-semibold sm:text-2xl dark:text-white">DN
                        Cloud</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="ms-3 flex items-center">
                    <div>
                        <button type="button"
                            class="flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Menu</span>
                            @if (Auth()->user()->avatar != null)
                            <picture class="h-8 w-8 rounded-full overflow-hidden">
                                <img src="{{ route("profile.avatar", Auth()->user()->avatar) }}" alt="Profile Image">
                            </picture>
                            @else
                            <svg class="h-9 w-9 rounded-full overflow-hidden" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 20C10.107 20 8.36763 19.3425 6.99768 18.2435C6.99845 18.2441 6.99923 18.2448 7 18.2454V17.5625C7 15.7676 8.49238 14.3125 10.3333 14.3125H13.6667C15.5076 14.3125 17 15.7676 17 17.5625V18.2454C15.6304 19.3433 13.8919 20 12 20ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5003 17.5593 21.9635 12.0675 21.9998C12.045 21.9999 12.0225 22 12 22C11.9763 22 11.9527 21.9999 11.9291 21.9998C6.43889 21.9616 2 17.4992 2 12ZM12 7C10.1591 7 8.66667 8.45507 8.66667 10.25C8.66667 12.0449 10.1591 13.5 12 13.5C13.8409 13.5 15.3333 12.0449 15.3333 10.25C15.3333 8.45507 13.8409 7 12 7Z" fill="currentColor" />
                            </svg>
                            @endif
                    </div>
                    <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded bg-white text-base shadow dark:divide-gray-600 dark:bg-gray-700"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                            </p>
                            <p class="truncate text-sm font-medium text-gray-900 dark:text-gray-300" role="none">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('chat') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Chat</a>
                            </li>
                            <li>
                                <button
                                    type="button" data-modal-target="settings-modal" data-modal-toggle="settings-modal"
                                    class="block w-full px-4 py-2 text-start text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Settings</button>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</nav>