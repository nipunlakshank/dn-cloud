<div
    x-data="{
        target: document.getElementById('navigation-menu'),
        trigger: document.getElementById('navigation-menu-toggle'),
        options: {
            placement: 'bottom-start',
            triggerType: 'click',
            offsetSkidding: 0,
            offsetDistance: 10,
            ignoreClickOutsideClass: false,
        },
        instanceOptions: {
            id: 'navigation-menu-dropdown',
            override: true,
        },
        dropdown: null,
    }"
    class="relative">
    <button id="navigation-menu-toggle"
        class="inline-flex items-center rounded-lg bg-white p-2 text-center text-sm text-gray-500 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-300 dark:focus:ring-blue-800"
        type="button">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 6H12.01M12 12H12.01M12 18H12.01" stroke="currentColor" stroke-width="4" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>

    <!-- Dropdown menu -->
    <div id="navigation-menu"
        x-init="dropdown = new Dropdown(target, trigger, options, instanceOptions)"
        class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow shadow-slate-500/10 dark:divide-gray-600 dark:bg-gray-800 dark:shadow-slate-200/10">
        <div class="overflow-hidden px-4 py-3 text-sm text-gray-900 dark:text-white">
            <span class="block w-full">{{ Auth::user()->name() }}</span>
            <span
                class="animate-slide inline-block w-full whitespace-nowrap font-medium transition-transform duration-500 ease-in-out">
                {{ Auth::user()->email }}
            </span>
        </div>
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="navigation-menu-toggle">

            <li>
                <a href="{{ route('dashboard') }}" wire:navigate
                    class="block w-full px-4 py-2 text-start hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
                <button
                    x-on:click="() => dropdown.hide()"
                    data-modal-target="settings-modal"
                    data-modal-toggle="settings-modal"
                    class="block w-full px-4 py-2 text-start hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    Settings
                </button>
            </li>

            @can('create', App\Models\Group::class)
                <li>
                    <button
                        x-on:click="() => dropdown.hide()"
                        data-modal-target="create-group-modal"
                        data-modal-toggle="create-group-modal"
                        class="block w-full px-4 py-2 text-start hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        Create Group
                    </button>
                </li>
            @endcan

            <li>
                <button
                    x-on:click="() => dropdown.hide()"
                    data-modal-target="new-chat-modal"
                    data-modal-toggle="new-chat-modal"
                    class="block w-full px-4 py-2 text-start hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    New Chat
                </button>
            </li>
        </ul>
        <div class="py-2">
            <button
                x-on:click="() => dropdown.hide()"
                data-modal-target="logout"
                data-modal-toggle="logout"
                class="block w-full px-4 py-2 text-start text-sm text-gray-600 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">
                Log Out
            </button>
        </div>
    </div>
</div>
