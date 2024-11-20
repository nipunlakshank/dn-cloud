<x-app-layout>

    <div class="flex h-screen flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full overflow-y-auto bg-white p-4 shadow-lg md:h-full md:w-1/3">
            <!-- Search bar -->
            <div class="mb-4 flex items-center">
                <input type="text" placeholder="Search"
                    class="w-full rounded-md border px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <button class="ml-2 hidden p-2 md:inline-block">
                    <i class="fas fa-cog text-gray-600"></i> <!-- Replace with actual icon or image -->
                </button>
            </div>

            <!-- Filter buttons -->
            <div class="mb-4 flex justify-around">
                <button class="rounded-full bg-blue-500 px-4 py-1 text-white">All</button>
                <button class="px-4 py-1 text-gray-600">Unread</button>
                <button class="px-4 py-1 text-gray-600">Groups</button>
            </div>

            <!-- Message List -->
            <div class="space-y-4">
                <!-- Message Item -->
                <div class="flex items-start rounded-lg bg-blue-100 p-4">
                    <img src="https://via.placeholder.com/50" alt="Logo" class="mr-4 h-10 w-10 rounded-full">
                    <div>
                        <h3 class="font-semibold">Lorem ipsum dolor sit amet, consectetur</h3>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ea...
                        </p>
                    </div>
                    <span class="ml-auto text-xs text-gray-500">00:00</span>
                </div>

                <!-- Another Message Item -->
                <div class="flex items-start rounded-lg bg-blue-100 p-4">
                    <img src="https://via.placeholder.com/50" alt="Logo" class="mr-4 h-10 w-10 rounded-full">
                    <div>
                        <h3 class="font-semibold">Lorem ipsum dolor sit amet, consectetur</h3>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ea...
                        </p>
                    </div>
                    <span class="ml-auto text-xs text-gray-500">00:00</span>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="h-full flex-1 overflow-y-auto bg-gray-50 p-4">
            <p class="text-gray-600">here</p>
        </div>
    </div>

</x-app-layout>
