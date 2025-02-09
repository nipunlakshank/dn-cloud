<div id="message-{{ $message->id }}" class="group flex items-start gap-2.5"
    dir="{{ $isOwner ? 'rtl' : 'ltr' }}">

    @if ($inAGroup && !$isOwner)
        <img class="h-8 w-8 select-none rounded-full" src="{{ $avatar }}" alt="Avatar">
    @endif

    <div class="flex w-fit max-w-[60%] flex-col gap-1 lg:max-w-md">
        @if ($inAGroup && !$isOwner)
            <span class="text-sm font-semibold text-gray-900 dark:text-white">
                {{ $user->name ?? 'Unknown' }}
            </span>
        @endif
        <div
            class="{{ $isOwner ? 'bg-green-200 dark:bg-teal-900' : 'bg-white dark:bg-gray-700' }} flex flex-col justify-between gap-1 rounded-e-xl rounded-es-xl border-gray-200 px-4 py-2 transition-colors">
            <p dir="ltr" class="text-sm font-normal text-gray-900 dark:text-white">
                {!! nl2br(e($message->text ?? 'Message')) !!}</p>

            <div class="flex select-none items-end justify-end gap-1" dir="ltr">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    {{ $message->created_at->format('h:i a') ?? '00:00' }}
                </span>
                @if ($isOwner)
                    <div
                        class="{{ $state === 'read' ? 'text-blue-500' : 'text-gray-400' }} relative h-[18px] w-[24px]">
                        <!-- First Check (Always visible) -->
                        <svg class="absolute left-0 top-0 h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12L9 16L19 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        @if ($state === 'delivered' || $state === 'read')
                            <!-- Second Check (Only visible when delivered or read) -->
                            <svg class="{{ $state === 'read' ? 'text-blue-500' : 'text-gray-400' }} absolute left-[0.33rem] top-0 h-[18px] w-[18px]"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12L9 16L19 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <button id="messageOptionsButton-{{ $message->id }}" data-dropdown-toggle="messageOptions-{{ $message->id }}"
        data-dropdown-placement="bottom-start"
        class="hidden items-center self-center rounded-lg bg-white p-2 text-center text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-50 group-hover:inline-flex dark:bg-gray-900 dark:text-white dark:hover:bg-gray-800 dark:focus:ring-gray-600"
        type="button">
        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 4 15">
            <path
                d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
        </svg>
    </button>

    <div id="messageOptions-{{ $message->id }}" dir="ltr"
        class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:divide-gray-600 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="messageOptionsButton-{{ $message->id }}">
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reply</a>
            </li>
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Forward</a>
            </li>
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copy</a>
            </li>
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
            </li>
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
            </li>
        </ul>
    </div>

    @script
        <script type="text/javascript">
            let isOwner = @js($isOwner);
            $options = {
                placement: isOwner ? 'left-end' : 'right-end',
                triggerType: "click",
                offsetSkidding: 0,
                offsetDistance: 10,
                ignoreClickOutsideClass: false,
            };

            $instanceOptions = {
                id: "messageOptions-{{ $message->id }}",
                override: true,
            };

            $target = document.getElementById("messageOptions-{{ $message->id }}");
            $trigger = document.getElementById("messageOptionsButton-{{ $message->id }}");

            new Dropdown(
                $target,
                $trigger,
                $options,
                $instanceOptions
            );
        </script>
    @endscript
</div>
