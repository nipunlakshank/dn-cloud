<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
        <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>Telegram Web-like Layout</title>
    </head>

    <body class="flex h-screen">
        <div class="flex h-full w-full flex-col">
            <!-- Navbar -->
            @include('layouts.navigation')

            <main class="flex h-screen flex-1 bg-gray-800 py-[50px]">
                <!-- Sidebar -->
                <x-chat.list>
                    <x-chat.list-item>Chat 1</x-chat.list-item>
                    <x-chat.list-item>Chat 2</x-chat.list-item>
                    <x-chat.list-item>Chat 3</x-chat.list-item>
                    <x-chat.list-item>Chat 4</x-chat.list-item>
                    <x-chat.list-item>Chat 5</x-chat.list-item>
                    <x-chat.list-item>Chat 6</x-chat.list-item>
                    <x-chat.list-item>Chat 7</x-chat.list-item>
                    <x-chat.list-item>Chat 8</x-chat.list-item>
                    <x-chat.list-item>Chat 9</x-chat.list-item>
                    <x-chat.list-item>Chat 10</x-chat.list-item>
                    <x-chat.list-item>Chat 11</x-chat.list-item>
                    <x-chat.list-item>Chat 12</x-chat.list-item>
                    <x-chat.list-item>Chat 13</x-chat.list-item>
                    <x-chat.list-item>Chat 14</x-chat.list-item>
                </x-chat.list>

                <!-- Main Content Area -->
                <div class="flex h-full flex-1 flex-col">
                    <!-- Chat Content Scrollable Area -->
                    <div class="flex-1 overflow-y-scroll p-4 pb-[50px]">
                        <x-chat.canvas class="chat-messages flex flex-col space-y-4">
                            <!-- Chat messages go here -->
                            <x-chat.bubble class="rounded-lg bg-white p-4 shadow-md">Message 1</x-chat.bubble>
                            <x-chat.bubble class="rounded-lg bg-white p-4 shadow-md">Message 2</x-chat.bubble>
                            <x-chat.bubble class="rounded-lg bg-white p-4 shadow-md">Message 3</x-chat.bubble>
                            <x-chat.bubble class="rounded-lg bg-white p-4 shadow-md">Message 4</x-chat.bubble>
                            <x-chat.bubble class="rounded-lg bg-white p-4 shadow-md">Message 5</x-chat.bubble>
                            <x-chat.bubble class="rounded-lg bg-white p-4 shadow-md">Message 6</x-chat.bubble>
                            <x-chat.bubble class="rounded-lg bg-white p-4 shadow-md">Message 5</x-chat.bubble>
                        </x-chat.canvas>
                    </div>

                    <!-- Fixed Bottom Bar for Input -->
                    <div class="fixed bottom-0 left-1/4 right-0 flex items-center bg-gray-800 p-4 text-white">
                        <x-chat.input-bar placeholder="Type a message...">Type a message...</x-chat.input-bar>
                    </div>
                </div>
            </main>
        </div>
    </body>

</html>
