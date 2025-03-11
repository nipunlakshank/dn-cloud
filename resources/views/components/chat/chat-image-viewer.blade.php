<!-- Chat Image Viewer -->
<div
    x-data="{
        target:document.getElementById('chat-image-viewer'),
        options:{
            placement: 'center-center',
            backdrop: 'dynamic',
            backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
            closable: true,
        },
        instanceOptions:{
            id: 'chat-image-viewer',
            override: true
        },
        imageViewer:null
    }"
    x-init="imageViewer = new Modal(target,options,instanceOptions)"
    x-on:open-image-viewer.window="imageViewer.show()"
    id="chat-image-viewer"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="relative p-4 w-fit max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="bg-gray-200 rounded-lg shadow-slate-900 backdrop:bg-current dark:bg-gray-700 relative">
            <!-- Modal header -->
            <button
                x-on:click="()=>imageViewer.hide()"
                type="button"
                class="absolute top-[-1rem] right-[-1rem] bg-gray-200 text-gray-900 hover:bg-red-500 hover:text-gray-100 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-red-500 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close</span>
            </button>
            <!-- Modal body -->
            <div class="p-4 md:p-5 flex justify-center items-center">
                <picture class="w-fit rounded-lg overflow-hidden">
                    <img id="message-image" class="w-full h-full" />
                </picture>
            </div>
        </div>
    </div>
</div>