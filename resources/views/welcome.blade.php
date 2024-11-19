<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Chatting Landing Page</title>
        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer type="text/javascript">
            const ROOT = "{{ URL::to('/') }}"
        </script>
        <script defer src="js/functions.js"></script>
        <script defer src="js/script.js"></script>
    </head>

    <body class="flex min-h-screen flex-col justify-between bg-blue-300 font-sans transition-colors dark:bg-gray-800">
        <div
            class="container mx-auto flex h-full flex-grow flex-col sm:max-w-full md:max-w-full lg:max-w-full xl:max-w-full 2xl:max-w-full">
            <!-- Navbar -->
            <nav class="flex items-center justify-between p-6 text-gray-600 dark:text-gray-200">
                <div class="grid grid-flow-col grid-rows-1">
                    <img src="img/logo.png" style="width: 100px;height: 100px;" class="row-span-2 row-end-3" />
                    <div class="row-span-2 row-start-1 mt-8 text-justify text-3xl font-bold transition-colors"
                        id="header-text">DN
                        CLOUD</div>
                </div>

                <ul class="mr-6 hidden space-x-6 text-gray-600 md:flex dark:text-gray-200">

                    <li class="pt-2"><a href="#" class="rounded p-2 hover:bg-blue-500 hover:text-white"
                            id="textname1">Home</a></li>
                    <li class="hover:blue-500 pt-2"><a href="/about-us"
                            class="rounded p-2 hover:bg-blue-500 hover:text-white" id="textname2">About</a></li>

                    <li class="hover:blue-500 pt-2"><a href="/contact"
                            class="rounded p-2 hover:bg-blue-500 hover:text-white "
                            id="textname3">Contact Us</a></li>

                    <a class="mb-7 rounded bg-blue-600 px-5 py-2 text-sm text-white hover:bg-blue-700 md:text-base"
                        href="/login">Login</a>

                    <button class="mb-7 rounded bg-blue-600 px-5 py-2 text-sm text-white hover:bg-blue-700 md:text-base"
                        onclick="toggleDarkMode()">
                        color
                    </button>

                </ul>
                <!-- Mobile Menu Button -->
                <button class="text-gray-600 focus:outline-none md:hidden">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </nav>

            <!-- Hero Section -->
            <section class="flex flex-col items-center justify-center px-6 py-10 xl:flex-row md:px-8 md:py-20">
                <!-- Illustration -->
                <div class="align-center mb-8 flex flex-1 justify-center md:mb-0">
                    <img src="img/homebackground.png" alt="">
                </div>

                <!-- Text Content -->
                <div class="flex-2 text-center md:text-left">
                    <h1 class="text-6xxl mb-3 font-bold leading-tight text-black md:text-6xl dark:text-white">Have your
                        <br> best
                        chat
                    </h1>
                    <p class="mb-6 text-sm text-gray-600 md:text-base dark:text-gray-200">

                        We are Online chat application for companys to share them files.
                    </p>
                    <div class="flex justify-center space-x-4 md:justify-start">
                        <a class="rounded bg-blue-600 px-4 py-2 text-sm text-white hover:bg-blue-700 md:text-base"
                            href="/signin">Login</a>
                        <button
                            class="rounded bg-indigo-400 px-4 py-2 text-sm text-white font-bold hover:bg-gray-50 hover:text-gray-900 md:text-base">
                            Free Trial 30 Days
                        </button>
                    </div>
                </div>
            </section>
            <!-- Footer -->
        </div>
        <x-footer></x-footer>
    </body>

</html>
