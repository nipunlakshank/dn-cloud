<!-- Image modal -->
<div id="chat-attachment-modal-image" tabindex="-1" aria-hidden="true"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
    <div class="relative max-h-full w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-4 md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Image Attachments
                </h3>
                <button id="image-modal-button-close" type="button"
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label for="chat-attachment-image"
                            class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 flex w-full items-center gap-2 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13 10C13 9.44772 13.4477 9 14 9H14.01C14.5623 9 15.01 9.44772 15.01 10C15.01 10.5523 14.5623 11 14.01 11H14C13.4477 11 13 10.5523 13 10Z"
                                    fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2 6C2 4.89543 2.89543 4 4 4H20C21.1046 4 22 4.89543 22 6V18C22 18.5561 21.7731 19.0591 21.4068 19.4216C21.3579 19.5267 21.2907 19.6236 21.2071 19.7071C21.0196 19.8946 20.7652 20 20.5 20L4 20C3.86193 20 3.72713 19.986 3.59693 19.9594C2.79951 19.7962 2.17496 19.1584 2.03125 18.3541C2.01072 18.2392 2 18.1208 2 18V6ZM8.89188 18L12.7246 12.644L8.7348 8.32172C8.53068 8.10059 8.23781 7.98314 7.93746 8.00196C7.6371 8.02078 7.36119 8.17387 7.18627 8.41876L4 12.8795V6L20 6V15.9496L16.7433 12.331C16.5405 12.1057 16.2464 11.9845 15.9437 12.0016C15.6411 12.0186 15.3625 12.1721 15.1863 12.4188L11.1997 18H8.89188Z"
                                    fill="currentColor" />
                            </svg>Select Image Files</label>
                        <input required multiple type="file" accept=".png, .jpg, .jpeg" name="chat-attachment-image"
                            id="chat-attachment-image" class="hidden">
                    </div>

                    <div class="col-span-2">
                        <textarea id="image-message" rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            placeholder="Message (Optional)"></textarea>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Send
                </button>
            </form>
        </div>
    </div>
</div>
