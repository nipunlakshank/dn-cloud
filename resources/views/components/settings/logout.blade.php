<!-- Logout Modal -->
<div
    x-data="{
        target: document.getElementById('logout'),
        options: {
            placement: 'center-center',
            backdrop: 'dynamic',
            backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
            closable: true,
            onShow: () => { $dispatch('hide-dropdown-menu') }
        },
        instanceOptions: {
            id: 'logout',
            override: true
        },
    }"
    id="logout"
    x-init="logoutModal = new Modal(target, options, instanceOptions)"
    x-on:show-logout-modal.window="logoutModal.show()"
    class="absolute left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">

    <div class="relative max-h-full w-full max-w-md p-4">
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <button type="button"
                class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                x-on:click="() => logoutModal.hide()">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">modal</span>
            </button>
            <div class="p-4 text-center md:p-5">
                <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to logout?
                </h3>
                <form class="inline-flex" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        x-on:click="() => logoutModal.hide()"
                        class="inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                        Yes, I'm sure
                    </button>
                </form>
                <button
                    type="button"
                    x-on:click="() => logoutModal.hide()"
                    class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                    No, cancel
                </button>
            </div>
        </div>
    </div>
</div>

