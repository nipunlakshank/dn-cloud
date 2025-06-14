<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DN Cloud') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans text-gray-900 antialiased">
        <div
            class="flex min-h-screen flex-col items-center justify-center bg-gray-100 pt-6 sm:pt-0 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="h-20 w-20 fill-current text-gray-500" />
                </a>
            </div>

            <div
                class="mt-6 w-full max-w-md overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-lg sm:rounded-lg dark:bg-gray-800">
                {{ $slot }}
            </div>
        </div>
    </body>

</html>
