<div class="flex items-start gap-2.5" {{ $attributes }}>
    <img class="h-8 w-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
        alt="Avatar">
    <div class="flex flex-col gap-1">
        <div class="flex items-center space-x-2 rtl:space-x-reverse">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $name ?? 'Bonnie Green' }}</span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $time ?? '11:46' }}</span>
        </div>
        <div
            class="leading-1.5 flex w-full max-w-[320px] flex-col rounded-e-xl rounded-es-xl border-gray-200 bg-white p-4 dark:bg-gray-700">
            <p class="text-sm font-normal text-gray-900 dark:text-white">{{ $text ?? 'Message' }}</p>
            <div class="my-2.5 grid grid-cols-2 gap-4">
                <div class="group relative">

                    <img src="https://flowbite.com/docs/images/blog/image-1.jpg" class="chat-image-bubble rounded-lg"
                        data-message-id="002" data-modal-target="chat-image-viewer"
                        data-modal-toggle="chat-image-viewer" " />
                </div>
                <div class="group relative">

                    <img src="https://flowbite.com/docs/images/blog/image-2.jpg" class="chat-image-bubble rounded-lg" data-message-id="003" data-modal-target="chat-image-viewer" data-modal-toggle="chat-image-viewer" />
                </div>
                <div class="group relative">

                    <img src="https://flowbite.com/docs/images/blog/image-3.jpg" class="chat-image-bubble rounded-lg" data-message-id="004" data-modal-target="chat-image-viewer" data-modal-toggle="chat-image-viewer" />
                </div>
                <div class="group relative">
                    <!-- <button
                        class="absolute flex h-full w-full items-center justify-center rounded-lg bg-gray-900/90 transition-all duration-300 hover:bg-gray-900/50">
                        <span class="text-xl font-medium text-white">+7</span>
                        <div id="download-image" role="tooltip"
                            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                            Download image
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </button> -->
                    <img src="https://flowbite.com/docs/images/blog/image-1.jpg" class="chat-image-bubble rounded-lg" data-message-id="005" data-modal-target="chat-image-viewer" data-modal-toggle="chat-image-viewer" />
                </div>
            </div>
            <div class="flex items-center justify-end">
                <button
                    class="inline-flex items-center text-sm font-medium text-blue-700 hover:underline dark:text-blue-500">
                    <svg class="me-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 16 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d=" M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3" />
                    </svg>
                    Save all</button>
                </div>
            </div>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $status ?? 'Delivered' }}</span>
        </div>
        <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" data-dropdown-placement="bottom-start"
            class="inline-flex items-center self-center rounded-lg bg-white p-2 text-center text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-50 dark:bg-gray-900 dark:text-white dark:hover:bg-gray-800 dark:focus:ring-gray-600"
            type="button">
            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 4 15">
                <path
                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
            </svg>
        </button>
        <div id="dropdownDots"
            class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:divide-gray-600 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                <li>
                    <a href="#"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reply</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Forward</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copy</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                </li>
            </ul>
        </div>
    </div>

