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

        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/firebase.js'])

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
        <x-toast></x-toast>

        @livewire('modals.image-attachment-modal')
        @livewire('modals.document-attachment-modal')
        @livewire('modals.report-attachment-modal')

        @livewireScripts
    </body>

</html>
