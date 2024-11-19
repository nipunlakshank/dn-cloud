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

    <body class="flex min-h-screen flex-col justify-between bg-fill font-sans transition-colors dark:bg-gray-800">
        <div
            class="container mx-auto flex h-full flex-grow flex-col sm:max-w-full md:max-w-full lg:max-w-full xl:max-w-full 2xl:max-w-full">
            <!-- Navbar -->
            <x-nav>

            </x-nav>

            <!-- Hero Section -->
            <section class="flex flex-col items-center justify-center px-6 py-10 xl:flex-row md:px-8 md:py-20">
                <!-- Illustration -->
                <div class="align-center mb-8 flex flex-1 justify-center md:mb-0">
                    <img src="img/homebackground.png" alt="">
                </div>

                <!-- Text Content -->
                <div class="flex-2 text-center md:text-left">
                    <h1 class="text-6xxl mb-3 font-bold leading-tight md:text-6xl text-hefont">Have your
                        <br> best
                        chat
                    </h1>
                    <p class="mb-6 text-sm text-font md:text-base ">

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
