<div id="alert-message"
    x-data="{ show: false, alertMessage: '', alertType: 'info' }"
    x-on:alert.window="
        alertMessage = $event.detail[0].message;
        alertType = $event.detail[0].type ?? 'info'; // Default to 'info' if no type is provided
        show = true;
        setTimeout(() => show = false, 5000);
     "
    x-cloak
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-10"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-10"
    role="alert"
    class="absolute bottom-2 left-0 right-0 z-[999] flex justify-center">

    <div
        class="mb-4 flex w-full max-w-xs items-center rounded-lg bg-white p-4 shadow-sm shadow-gray-700/10 dark:bg-gray-800 dark:text-gray-400 dark:shadow-gray-400/10">
        <!-- Dynamic Icon -->
        <div class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg"
            :class="{
                'bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200': alertType === 'success',
                'bg-red-100 text-red-500 dark:bg-red-800 dark:text-red-200': alertType === 'error',
                'bg-orange-100 text-orange-500 dark:bg-orange-700 dark:text-orange-200': alertType === 'warning',
                'bg-blue-100 text-blue-500 dark:bg-blue-800 dark:text-blue-200': alertType === 'info'
            }">
            <template x-if="alertType === 'success'">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
            </template>
            <template x-if="alertType === 'warning'">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                </svg>
            </template>
            <template x-if="alertType === 'error'">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5A9.5 9.5 0 1 0 19.5 10 9.5 9.5 0 0 0 10 .5Zm4 13.5a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 1 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
            </template>
            <template x-if="alertType === 'info'">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 0a10 10 0 1 0 10 10A10 10 0 0 0 10 0Zm0 18a8 8 0 1 1 8-8 8.01 8.01 0 0 1-8 8ZM10 8a1 1 0 0 1-1-1V5a1 1 0 1 1 2 0v2a1 1 0 0 1-1 1Zm0 8a1 1 0 0 1-1-1v-4a1 1 0 1 1 2 0v4a1 1 0 0 1-1 1Z" />
                </svg>
            </template>
        </div>

        <!-- Message -->
        <div class="ms-3 text-sm font-normal" x-text="alertMessage"></div>

        <!-- Close Button -->
        <button type="button" @click="show = false"
            class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
            aria-label="Close">
            <svg class="h-3 w-3" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1l6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
</div>
