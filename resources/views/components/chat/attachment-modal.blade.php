<div>
    <!-- Image modal -->
    <div id="chat-attachment-modal-image" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Image Attachments
                    </h3>
                    <button id="image-modal-button-close" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="chat-attachment-image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 flex items-center gap-2 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13 10C13 9.44772 13.4477 9 14 9H14.01C14.5623 9 15.01 9.44772 15.01 10C15.01 10.5523 14.5623 11 14.01 11H14C13.4477 11 13 10.5523 13 10Z" fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6C2 4.89543 2.89543 4 4 4H20C21.1046 4 22 4.89543 22 6V18C22 18.5561 21.7731 19.0591 21.4068 19.4216C21.3579 19.5267 21.2907 19.6236 21.2071 19.7071C21.0196 19.8946 20.7652 20 20.5 20L4 20C3.86193 20 3.72713 19.986 3.59693 19.9594C2.79951 19.7962 2.17496 19.1584 2.03125 18.3541C2.01072 18.2392 2 18.1208 2 18V6ZM8.89188 18L12.7246 12.644L8.7348 8.32172C8.53068 8.10059 8.23781 7.98314 7.93746 8.00196C7.6371 8.02078 7.36119 8.17387 7.18627 8.41876L4 12.8795V6L20 6V15.9496L16.7433 12.331C16.5405 12.1057 16.2464 11.9845 15.9437 12.0016C15.6411 12.0186 15.3625 12.1721 15.1863 12.4188L11.1997 18H8.89188Z" fill="currentColor" />
                                </svg>Select Image Files</label>
                            <input required multiple type="file" accept=".png, .jpg, .jpeg" name="chat-attachment-image" id="chat-attachment-image" class="hidden">
                        </div>

                        <div class="col-span-2">
                            <textarea id="image-message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Message (Optional)"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Document modal -->
    <div id="chat-attachment-modal-document" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Document Attachments
                    </h3>
                    <button id="document-modal-button-close" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="chat-attachment-document" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 flex items-center gap-2 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9 2.22117V7H4.22117C4.31517 6.81709 4.43766 6.64812 4.58579 6.5L8.5 2.58579C8.64812 2.43766 8.81709 2.31517 9 2.22117ZM11 2V7C11 8.10457 10.1046 9 9 9H4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V4C20 2.89543 19.1046 2 18 2H11Z" fill="currentColor" />
                                </svg>Select Document Files</label>
                            <input required multiple type="file" accept=".pdf, .doc, .docx, .xlsx, .xls, .csv" name="chat-attachment-document" id="chat-attachment-document" class="hidden">
                        </div>

                        <div class="col-span-2">
                            <textarea id="document-message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Message (Optional)"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Daily Reports modal -->
    <div id="chat-attachment-modal-reports" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Daily Reports
                    </h3>
                    <button id="report-modal-button-close" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">

                        <div class="col-span-2">
                            <label for="chat-attachment-report-image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 flex items-center gap-2 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13 10C13 9.44772 13.4477 9 14 9H14.01C14.5623 9 15.01 9.44772 15.01 10C15.01 10.5523 14.5623 11 14.01 11H14C13.4477 11 13 10.5523 13 10Z" fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6C2 4.89543 2.89543 4 4 4H20C21.1046 4 22 4.89543 22 6V18C22 18.5561 21.7731 19.0591 21.4068 19.4216C21.3579 19.5267 21.2907 19.6236 21.2071 19.7071C21.0196 19.8946 20.7652 20 20.5 20L4 20C3.86193 20 3.72713 19.986 3.59693 19.9594C2.79951 19.7962 2.17496 19.1584 2.03125 18.3541C2.01072 18.2392 2 18.1208 2 18V6ZM8.89188 18L12.7246 12.644L8.7348 8.32172C8.53068 8.10059 8.23781 7.98314 7.93746 8.00196C7.6371 8.02078 7.36119 8.17387 7.18627 8.41876L4 12.8795V6L20 6V15.9496L16.7433 12.331C16.5405 12.1057 16.2464 11.9845 15.9437 12.0016C15.6411 12.0186 15.3625 12.1721 15.1863 12.4188L11.1997 18H8.89188Z" fill="currentColor" />
                                </svg>Select Image Files</label>
                            <input required multiple type="file" accept=".png, .jpg, .jpeg" name="chat-attachment-report-image" id="chat-attachment-report-image" class="hidden">
                        </div>

                        <div class="col-span-2">
                            <label for="chat-attachment-report-document" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 flex items-center gap-2 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9 2.22117V7H4.22117C4.31517 6.81709 4.43766 6.64812 4.58579 6.5L8.5 2.58579C8.64812 2.43766 8.81709 2.31517 9 2.22117ZM11 2V7C11 8.10457 10.1046 9 9 9H4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V4C20 2.89543 19.1046 2 18 2H11Z" fill="currentColor" />
                                </svg>Select Document Files</label>
                            <input required multiple type="file" accept=".pdf, .doc, .docx, .xlsx, .xls, .csv" name="chat-attachment-report-document" id="chat-attachment-report-document" class="hidden">
                        </div>

                        <div class="col-span-2">
                            <textarea id="report-message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Message(Optional)"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>