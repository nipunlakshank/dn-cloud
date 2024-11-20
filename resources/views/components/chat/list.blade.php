<!-- <aside id="logo-sidebar" -->
<!--     class="fixed left-0 top-0 h-full w-1/4 -translate-x-full overflow-y-auto border-r border-gray-200 pb-4 pt-[100px] transition-transform sm:translate-x-0 dark:border-gray-700 dark:bg-gray-800" -->
<!--     aria-label="Sidebar"> -->
<!--     <div class="flex h-full flex-col space-y-4 overflow-y-auto px-3 dark:bg-gray-800"> -->
<!--         <ul class="space-y-2 font-medium"> -->
<!--             {{ $slot }} -->
<!--         </ul> -->
<!--     </div> -->
<!-- </aside> -->

<aside id="logo-sidebar"
    class="h-full w-1/4 space-y-4 overflow-y-auto bg-gray-800 pt-[40px] text-white transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="p-4">
        <h2 class="text-xl font-semibold">Chats</h2>
    </div>
    <div class="flex flex-col space-y-4 overflow-y-auto px-3">
        <ul class="space-y-2 font-medium">
            {{-- Chat list items --}}
            {{ $slot }}
        </ul>
    </div>
</aside>
