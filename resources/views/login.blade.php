<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-50">

    <div class="w-full h-full sm:h-auto sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl p-6 md:p-8 lg:p-10 bg-white rounded-none sm:rounded-lg shadow-none sm:shadow-lg flex flex-col justify-center">
        <div class="flex justify-center mb-6">
            <!-- Logo -->
            <img src="img/logo.png" alt="DN Cloud Logo" class="h-16 w-16 sm:h-20 sm:w-20 lg:h-24 lg:w-24">
        </div>

        <!-- Title and Subtitle -->
        <h2 class="text-xl sm:text-2xl lg:text-3xl font-semibold text-center text-gray-800">Login to X</h2>
        <p class="text-center text-gray-500 mb-6 text-sm sm:text-base lg:text-lg">Welcome to the application</p>

        <!-- Login Form -->
        <form action="#" method="POST" class="flex-grow">
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm sm:text-base lg:text-lg">Your Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>

            <!-- Password Input -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm sm:text-base lg:text-lg">Your Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>

            <!-- Login Button -->
            <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-gray-400 rounded-md hover:bg-gray-500 focus:outline-none focus:ring focus:ring-gray-300 text-sm sm:text-base lg:text-lg">Log in</button>
        </form>

        <!-- Help Links -->
        <div class="mt-6 text-center">
            <a href="#" class="text-sm sm:text-base lg:text-lg text-gray-500 hover:underline">Need help?</a>
            <span class="text-gray-300">|</span>
            <a href="#" class="text-sm sm:text-base lg:text-lg text-gray-500 hover:underline">FAQ</a>
        </div>
    </div>

</body>

</html>

</html>
