<x-app-layout>

    <div class="flex flex-col md:flex-row h-screen">
        <!-- Sidebar -->
        <div class="w-full md:w-1/3 bg-white shadow-lg p-4 md:h-full overflow-y-auto">
            <!-- Search bar -->
            <div class="flex items-center mb-4">
                <input type="text" placeholder="Search" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                <button class="ml-2 p-2 hidden md:inline-block">
                    <i class="fas fa-cog text-gray-600"></i> <!-- Replace with actual icon or image -->
                </button>
            </div>

            <!-- Filter buttons -->
            <div class="flex justify-around mb-4">
                <button class="px-4 py-1 bg-blue-500 text-white rounded-full">All</button>
                <button class="px-4 py-1 text-gray-600">Unread</button>
                <button class="px-4 py-1 text-gray-600">Groups</button>
            </div>

            <!-- Message List -->
            <div class="space-y-4">
                <!-- Message Item -->
                <div class="flex items-start p-4 bg-blue-100 rounded-lg">
                    <img src="https://via.placeholder.com/50" alt="Logo" class="w-10 h-10 mr-4 rounded-full">
                    <div>
                        <h3 class="font-semibold">Lorem ipsum dolor sit amet, consectetur</h3>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ea...</p>
                    </div>
                    <span class="ml-auto text-gray-500 text-xs">00:00</span>
                </div>

                <!-- Another Message Item -->
                <div class="flex items-start p-4 bg-blue-100 rounded-lg">
                    <img src="https://via.placeholder.com/50" alt="Logo" class="w-10 h-10 mr-4 rounded-full">
                    <div>
                        <h3 class="font-semibold">Lorem ipsum dolor sit amet, consectetur</h3>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ea...</p>
                    </div>
                    <span class="ml-auto text-gray-500 text-xs">00:00</span>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 bg-gray-50 p-4 h-full overflow-y-auto">
            <p class="text-gray-600">here</p>
        </div>
    </div>

</x-app-layout>

