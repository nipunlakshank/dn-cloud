<!-- Profile Info Modal -->
<div id="profile-info-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-1/2 max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <div id="chat-info" class="flex gap-3">
                    <img class="relative h-10 w-10 rounded-full"
                        src="{{ $avatar }}" alt="Avatar">
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $name  ?? 'Unknown' }}</span>
                        <span class="text-sm font-light text-gray-900 dark:text-white">online</span>
                    </div>
                </div>
                <button id="profile-modal-close" type="button" class="absolute top-[-1rem] right-[-1rem] bg-gray-200 text-gray-900 hover:bg-red-500 hover:text-gray-100 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-red-500 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">

                {{--

                //Group chat profile
            #Info
            #Group Members
            #Media

            --}}

                <!-- ========================== or ================================= -->

                {{--

                // Individual profile

                --}}
            </div>

        </div>
    </div>
</div>