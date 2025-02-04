<div id="message-{{ $message->id }}" class="group flex items-start gap-2.5"
    dir="{{ $user->id === auth()->id() ? 'rtl' : 'ltr' }}">

    <img class="h-8 w-8 rounded-full" src="{{ $avatar }}" alt="Jese image">

    <div class="flex w-fit max-w-[60%] flex-col gap-1 lg:max-w-md">
        <div class="flex items-center space-x-2 rtl:space-x-reverse">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">
                {{ $user->name() ?? 'Bonnie Green' }}
            </span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                {{ $message->created_at->format('H:i') ?? '11:46' }}
            </span>
        </div>
        <div
            class="leading-1.5 flex flex-col rounded-e-xl rounded-es-xl border-gray-200 bg-white p-4 dark:bg-gray-700">
            <p dir="ltr" class="text-sm font-normal text-gray-900 dark:text-white">
                {{ $message->text ?? 'Message' }}</p>
        </div>
        <span
            class="invisible text-sm font-normal text-gray-500 group-hover:visible dark:text-gray-400">{{ $status ?? 'Delivered' }}</span>
    </div>

    <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" data-dropdown-placement="bottom-start"
        class="hidden items-center self-center rounded-lg bg-white p-2 text-center text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-50 group-hover:inline-flex dark:bg-gray-900 dark:text-white dark:hover:bg-gray-800 dark:focus:ring-gray-600"
        type="button">
        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 4 15">
            <path
                d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
        </svg>
    </button>

    <div id="dropdownDots"
        class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:divide-gray-600 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
            <li> <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reply</a>
            </li>
            <li> <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Forward</a>
            </li>
            <li> <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copy</a>
            </li>
            <li> <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
            </li>
            <li> <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
            </li>
        </ul>
    </div>
</div>
