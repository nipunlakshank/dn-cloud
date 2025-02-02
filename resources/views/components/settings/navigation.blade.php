<!-- Main modal -->
<div id="settings-modal" tabindex="-1" aria-hidden="true"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
    <div class="relative max-h-full w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-4 md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Settings
                </h3>
                <button type="button"
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="settings-modal">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Connect with one of our available wallet
                    providers or create a new one.</p>
                <ul class="my-4 space-y-3">

                    <li>
                        <button type="button"
                            x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }"
                            x-init="$watch('darkMode', darkMode => toggleTheme(darkMode))"
                            class="group flex w-full items-center rounded-lg bg-gray-50 p-3 text-start text-base font-bold text-gray-900 hover:bg-gray-100 hover:shadow dark:bg-gray-600 dark:text-white dark:hover:bg-gray-500">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 21C7.02944 21 3 16.9706 3 12C3 7.19723 6.76201 3.27311 11.5 3.01367V3C11.1456 3.96621 11 4.91097 11 6.00002C11 10.9706 15.0294 15 20 15C20.2387 15 20.2539 15.0183 20.4879 15C19.2524 18.4956 15.9187 21 12 21Z"
                                    stroke="#111928" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <span class="ms-3 flex-1 whitespace-nowrap">Dark Mode</span>

                            <label class="inline-flex cursor-pointer items-center lg:hidden">
                                <input type="checkbox"
                                    x-on:click="darkMode = !darkMode"
                                    x-model="darkMode"
                                    class="peer sr-only">
                                <div
                                    class="peer relative h-5 w-9 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800">
                                </div>

                            </label>

                            <label class="hidden cursor-pointer items-center lg:inline-flex">
                                <input type="checkbox"
                                    x-on:click="darkMode = !darkMode"
                                    x-model="darkMode"
                                    class="peer sr-only">
                                <div
                                    class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800">
                                </div>

                            </label>
                        </button>
                    </li>
                    <li>
                        <a href="#"
                            class="group flex items-center rounded-lg bg-gray-50 p-3 text-base font-bold text-gray-900 hover:bg-gray-100 hover:shadow dark:bg-gray-600 dark:text-white dark:hover:bg-gray-500">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 12L8 12M20 12L16 16M20 12L16 8M9 4H7C5.34315 4 4 5.34315 4 7V17C4 18.6569 5.34315 20 7 20H9"
                                    stroke="#111928" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="ms-3 flex-1 whitespace-nowrap">Log Out</span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </div>

</div>
<x-settings.registration></x-settings.registration>
<x-settings.profile></x-settings.profile>
<x-settings.add-group></x-settings.add-group>
<x-settings.new-chat></x-settings.new-chat>
<x-settings.logout></x-settings.logout>
<x-chat.chat-image-viewer></x-chat.chat-image-viewer>