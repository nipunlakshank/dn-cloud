<x-guest-layout>

    <div
        class="flex h-full w-full flex-col justify-center rounded-none bg-white p-6 shadow-none sm:h-auto sm:max-w-sm sm:rounded-lg sm:shadow-lg md:max-w-md md:p-8 lg:max-w-lg lg:p-10 xl:max-w-2xl">
        <!-- <div class="mb-6 flex justify-center"> -->
        <!--     <img src="img/logo.png" alt="DN Cloud Logo" class="h-16 w-16 sm:h-20 sm:w-20 lg:h-24 lg:w-24"> -->
        <!-- </div> -->

        <!-- Title and Subtitle -->
        <h2 class="text-center text-xl font-semibold text-gray-800 sm:text-2xl lg:text-3xl">Login to X</h2>
        <p class="mb-6 text-center text-sm text-gray-500 sm:text-base lg:text-lg">Welcome to the application</p>

        <!-- Login Form -->
        <form action="#" method="POST" class="flex-grow">
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700 sm:text-base lg:text-lg">Your Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                    required>
            </div>

            <!-- Password Input -->
            <div class="mb-6">
                <label for="password" class="block text-sm text-gray-700 sm:text-base lg:text-lg">Your Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                    required>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full rounded-md bg-gray-400 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-500 focus:outline-none focus:ring focus:ring-gray-300 sm:text-base lg:text-lg">Log
                in</button>
        </form>

        <!-- Help Links -->
        <div class="mt-6 text-center">
            <a href="#" class="text-sm text-gray-500 hover:underline sm:text-base lg:text-lg">Need help?</a>
            <span class="text-gray-300">|</span>
            <a href="#" class="text-sm text-gray-500 hover:underline sm:text-base lg:text-lg">FAQ</a>
        </div>
    </div>

</x-guest-layout>
