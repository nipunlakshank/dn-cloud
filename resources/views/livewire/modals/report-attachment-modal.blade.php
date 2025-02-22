<!-- Daily Reports modal -->
<div id="chat-attachment-modal-reports" tabindex="-1" aria-hidden="true"
    wire:ignore
    x-data="{
        imgs: @entangle('images'),
        docs: @entangle('documents'),
        imgInfos: @entangle('imageInfos'),
        docInfos: @entangle('documentInfos'),
        get docCount() {
            return this.docs.length;
        },
        get imgCount() {
            return this.imgs.length;
        }
    }"

    x-init="() => {
        $watch('imgs', value => {
            $wire.processImages(value);
        });
        $watch('docs', value => {
            $wire.processDocuments(value);
        });
    }"

    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
    <div class="relative max-h-full w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-4 md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Daily Reports
                </h3>
                <button id="report-modal-button-close" type="button"
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
            <form class="p-4 md:p-5" wire:submit.prevent="send">
                <div class="mb-4 grid grid-cols-2 gap-4">

                    <div class="col-span-2">
                        <label for="chat-attachment-report-image"
                            class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 flex w-full items-center gap-2 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13 10C13 9.44772 13.4477 9 14 9H14.01C14.5623 9 15.01 9.44772 15.01 10C15.01 10.5523 14.5623 11 14.01 11H14C13.4477 11 13 10.5523 13 10Z"
                                    fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2 6C2 4.89543 2.89543 4 4 4H20C21.1046 4 22 4.89543 22 6V18C22 18.5561 21.7731 19.0591 21.4068 19.4216C21.3579 19.5267 21.2907 19.6236 21.2071 19.7071C21.0196 19.8946 20.7652 20 20.5 20L4 20C3.86193 20 3.72713 19.986 3.59693 19.9594C2.79951 19.7962 2.17496 19.1584 2.03125 18.3541C2.01072 18.2392 2 18.1208 2 18V6ZM8.89188 18L12.7246 12.644L8.7348 8.32172C8.53068 8.10059 8.23781 7.98314 7.93746 8.00196C7.6371 8.02078 7.36119 8.17387 7.18627 8.41876L4 12.8795V6L20 6V15.9496L16.7433 12.331C16.5405 12.1057 16.2464 11.9845 15.9437 12.0016C15.6411 12.0186 15.3625 12.1721 15.1863 12.4188L11.1997 18H8.89188Z"
                                    fill="currentColor" />
                            </svg>Select Image Files</label>
                        <input required multiple type="file" accept=".png, .jpg, .jpeg"
                            wire:model="images"
                            name="chat-attachment-report-image" id="chat-attachment-report-image" class="hidden">
                    </div>

                    <div class="col-span-2">
                        <label for="doc-input"
                            x-on:click="e => docCount > 0 && e.preventDefault()"
                            class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 flex w-full items-center gap-2 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9 2.22117V7H4.22117C4.31517 6.81709 4.43766 6.64812 4.58579 6.5L8.5 2.58579C8.64812 2.43766 8.81709 2.31517 9 2.22117ZM11 2V7C11 8.10457 10.1046 9 9 9H4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V4C20 2.89543 19.1046 2 18 2H11Z"
                                    fill="currentColor" />
                            </svg>
                            <div
                                class="scrollbar-hide relative flex items-center gap-2 overflow-x-auto [&::-webkit-scrollbar]:hidden">
                                <span x-show="docCount === 0">Select documents</span>
                                <button x-show="docCount > 0"
                                    for="doc-input"
                                    class="sticky left-0 inline-block text-nowrap rounded bg-blue-400 px-2 py-1 text-sm text-gray-200 dark:bg-blue-600 dark:text-gray-100">
                                    Add more
                                </button>
                                <div x-show="docCount > 0"
                                    class="flex w-full gap-1">
                                    <template x-for="doc in docInfos">
                                        <div
                                            tabindex="0"
                                            x-data="{ doc: doc }"
                                            class="flex gap-1 bg-gray-200 p-1 text-gray-800 dark:bg-gray-500 dark:text-gray-100">
                                            <span class="truncate text-nowrap text-sm" x-text="doc.name"></span>
                                            <button type="button"
                                                x-on:click="e => {
                                                    // FIXME: Can't remove last item, can't add more yet
                                                    e.preventDefault()
                                                    docs = docs.filter(item => { 
                                                        console.group('Item')
                                                        console.dir(doc.file)
                                                        console.dir(item)
                                                        console.groupEnd()
                                                        return item !== doc.file 
                                                    })
                                                    console.dir(docs)
                                                }"
                                                class="flex items-center text-gray-500 dark:text-gray-200">
                                                <svg width="18" height="18" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M6 6 18 18M6 18 18 6" stroke="currentColor"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1" />
                                                </svg>
                                            </button>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </label>
                        <input required multiple type="file" accept=".pdf, .doc, .docx, .xlsx, .xls, .csv"
                            wire:model="documents"
                            id="doc-input" name="doc-input" class="hidden">
                    </div>

                    <div class="col-span-2">
                        <textarea id="report-message" rows="4"
                            wire:model="text"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            placeholder="Message(Optional)"></textarea>
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
