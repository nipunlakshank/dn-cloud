<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
        <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body
        class="flex overflow-y-auto bg-gray-100 font-sans text-gray-900 antialiased dark:bg-gray-900 dark:text-gray-100">
        <div class="flex h-dvh w-full flex-col">
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow dark:bg-gray-800">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex h-dvh flex-1">
                {{ $slot }}
            </main>
        </div>
        <x-settings.navigation></x-settings.navigation>
        <x-chat.chat-image-viewer></x-chat.chat-image-viewer>

        @livewireScripts
    </body>

</html>
