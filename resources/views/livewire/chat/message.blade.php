<div
    x-data="{
        isOwner: @entangle('isOwner'),
        state: @entangle('state'),
        messageId: @entangle('messageId'),
    }"
    x-init="() => {
        const options = {
            placement: isOwner ? 'left-end' : 'right-end',
            triggerType: 'click',
            offsetSkidding: 0,
            offsetDistance: 10,
            ignoreClickOutsideClass: false,
        }
        const instanceOptions = {
            id: `messageOptions-${messageId}`,
            override: true,
        }
        new Dropdown(
            document.getElementById(`messageOptions-${messageId}`),
            document.getElementById(`messageOptionsButton-${messageId}`),
            options,
            instanceOptions
        )
    
        if (isOwner) {
            const senderState = setInterval(() => {
                try {
                    if (state === 'read') {
                        clearInterval(senderState)
                        return
                    }
                    $wire.refreshState()
                } catch (e) {
                    clearInterval(senderState)
                }
            }, 1000)
            return
        }
    
        const recieverState = setInterval(() => {
            try {
                if (state === 'read') {
                    clearInterval(recieverState)
                    return
                }
                if (state === 'delivered') {
                    $wire.markAsRead()
                    return
                }
                $wire.markAsDelivered()
            } catch (e) {
                clearInterval(recieverState)
            }
        }, 1000);
    }"
    id="message-{{ $message->id }}"
    class="group flex items-center gap-2.5" dir="{{ $isOwner ? 'rtl' : 'ltr' }}">

    @if ($inAGroup && !$isOwner)
        <img class="h-8 w-8 select-none rounded-full" src="{{ $avatar }}" alt="Avatar">
    @endif

    <div class="flex w-fit max-w-[80%] flex-col gap-1 lg:max-w-md">
        @if ($inAGroup && !$isOwner)
            <span class="text-sm font-semibold text-gray-900 dark:text-white" wire:ignore>
                {{ $user->name() ?? 'Unknown' }}
            </span>
        @endif
        <div
            class="{{ $isOwner ? 'bg-green-200 dark:bg-teal-900' : 'bg-white dark:bg-gray-700' }} flex flex-col justify-between gap-1 rounded-e-xl rounded-es-xl border-gray-200 px-4 py-2 transition-colors">

            @if ($message->is_report)
                <div class="mb-1 flex items-center gap-2 text-xs font-medium text-red-500 dark:text-red-400"
                    wire:ignore>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9 7V2.22117C8.81709 2.31517 8.64812 2.43766 8.5 2.58579L4.58579 6.5C4.43766 6.64812 4.31517 6.81709 4.22117 7H9ZM11 7V2H18C19.1046 2 20 2.89543 20 4V20C20 21.1046 19.1046 22 18 22H6C4.89543 22 4 21.1046 4 20V9H9C10.1046 9 11 8.10457 11 7ZM10 16C10 15.4477 9.55228 15 9 15C8.44772 15 8 15.4477 8 16V18C8 18.5523 8.44772 19 9 19C9.55228 19 10 18.5523 10 18V16ZM12 11C12.5523 11 13 11.4477 13 12V18C13 18.5523 12.5523 19 12 19C11.4477 19 11 18.5523 11 18V12C11 11.4477 11.4477 11 12 11ZM16 15C16 14.4477 15.5523 14 15 14C14.4477 14 14 14.4477 14 15V18C14 18.5523 14.4477 19 15 19C15.5523 19 16 18.5523 16 18V15Z"
                            fill="#f87171" />
                    </svg>

                    <span class="italic">Report</span>
                </div>
            @endif

            <div class="grid-cols-{{ $imageCount > 1 ? 2 : 1 }} grid gap-2" wire:ignore>
                @foreach ($attachments as $attachment)
                    @if ($attachment['category'] === 'image')
                        <div class="group relative" wire:key="message-attachment-{{ $attachment['id'] }}">
                            <img src="{{ Storage::url($attachment['path']) }}" class="chat-image-bubble rounded-lg"
                                data-message-id="{{ $message->id }}" data-modal-target="chat-image-viewer"
                                data-modal-toggle="chat-image-viewer" />
                        </div>
                    @else
                        <div wire:key="message-attachment-{{ $attachment['id'] }}"
                            dir="ltr"
                            class="leading-1.5 col-span-2 flex w-full flex-col rounded border-gray-200 bg-gray-50 dark:bg-gray-700">
                            <div class="flex items-start justify-between rounded-xl bg-white p-2 dark:bg-gray-600">
                                <div class="me-2">
                                    <div
                                        class="flex min-w-0 flex-1 items-center gap-2 pb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        @if (strtolower($attachment['type']) === 'pdf')
                                            <svg fill="none" aria-hidden="true" class="h-5 w-5 flex-shrink-0"
                                                viewBox="0 0 20 21">
                                                <g clip-path="url(#clip0_3173_1381)">
                                                    <path fill="#E2E5E7"
                                                        d="M5.024.5c-.688 0-1.25.563-1.25 1.25v17.5c0 .688.562 1.25 1.25 1.25h12.5c.687 0 1.25-.563 1.25-1.25V5.5l-5-5h-8.75z" />
                                                    <path fill="#B0B7BD"
                                                        d="M15.024 5.5h3.75l-5-5v3.75c0 .688.562 1.25 1.25 1.25z" />
                                                    <path fill="#CAD1D8" d="M18.774 9.25l-3.75-3.75h3.75v3.75z" />
                                                    <path fill="#F15642"
                                                        d="M16.274 16.75a.627.627 0 01-.625.625H1.899a.627.627 0 01-.625-.625V10.5c0-.344.281-.625.625-.625h13.75c.344 0 .625.281.625.625v6.25z" />
                                                    <path fill="#fff"
                                                        d="M3.998 12.342c0-.165.13-.345.34-.345h1.154c.65 0 1.235.435 1.235 1.269 0 .79-.585 1.23-1.235 1.23h-.834v.66c0 .22-.14.344-.32.344a.337.337 0 01-.34-.344v-2.814zm.66.284v1.245h.834c.335 0 .6-.295.6-.605 0-.35-.265-.64-.6-.64h-.834zM7.706 15.5c-.165 0-.345-.09-.345-.31v-2.838c0-.18.18-.31.345-.31H8.85c2.284 0 2.234 3.458.045 3.458h-1.19zm.315-2.848v2.239h.83c1.349 0 1.409-2.24 0-2.24h-.83zM11.894 13.486h1.274c.18 0 .36.18.36.355 0 .165-.18.3-.36.3h-1.274v1.049c0 .175-.124.31-.3.31-.22 0-.354-.135-.354-.31v-2.839c0-.18.135-.31.355-.31h1.754c.22 0 .35.13.35.31 0 .16-.13.34-.35.34h-1.455v.795z" />
                                                    <path fill="#CAD1D8"
                                                        d="M15.649 17.375H3.774V18h11.875a.627.627 0 00.625-.625v-.625a.627.627 0 01-.625.625z" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_3173_1381">
                                                        <path fill="#fff" d="M0 0h20v20H0z"
                                                            transform="translate(0 .5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6">
                                                <path fill="#E2E5E7"
                                                    d="M7 2h7l5 5v13a2 2 0 01-2 2H7a2 2 0 01-2-2V4a2 2 0 012-2z" />
                                                <path fill="#B0B7BD" d="M14 2v4a1 1 0 001 1h4l-5-5z" />
                                                <path fill="#6D6E71" d="M8 10h8v1H8zM8 14h8v1H8zM8 18h5v1H8z" />
                                            </svg>
                                        @endif
                                        <span class="line-clamp-2 text-sm">{{ $attachment['name'] }}</span>
                                    </div>
                                    <span class="flex gap-2 text-xs font-normal text-gray-500 dark:text-gray-400">
                                        {{ $attachment['size'] }}
                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="self-center"
                                            width="3"
                                            height="4" viewBox="0 0 3 4" fill="none">
                                            <circle cx="1.5" cy="2" r="1.5" fill="#6B7280" />
                                        </svg>
                                        {{ ucfirst(strtolower($attachment['category'])) }}
                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="self-center"
                                            width="3"
                                            height="4" viewBox="0 0 3 4" fill="none">
                                            <circle cx="1.5" cy="2" r="1.5" fill="#6B7280" />
                                        </svg>
                                        {{ strtolower($attachment['type']) }}
                                    </span>
                                </div>
                                <div class="inline-flex items-center self-center">
                                    <a
                                        target="_blank"
                                        href="{{ Storage::url($attachment['path']) }}"
                                        class="inline-flex items-center self-center rounded-lg bg-gray-50 p-2 text-center text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-50 dark:bg-gray-600 dark:text-white dark:hover:bg-gray-500 dark:focus:ring-gray-600"
                                        type="button">
                                        <svg class="h-4 w-4 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                            <path
                                                d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <p dir="ltr" class="break-words text-sm font-normal text-gray-900 dark:text-white">
                {!! nl2br(e($message->text ?? 'Message')) !!}</p>

            <div class="flex select-none items-end justify-end gap-1" dir="ltr"
                wire:key="message-footer-{{ $message->id }}">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    {{ $message->created_at->format('h:i a') ?? '00:00' }}
                </span>

                @if ($isOwner)
                    <div
                        wire:key="message-state-{{ $message->id }}"
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
                                <path d="M5 12L9 16L19 6" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        @endif
                    </div>
                @endif

            </div>
        </div>
    </div>

    <button id="messageOptionsButton-{{ $message->id }}" data-dropdown-toggle="messageOptions-{{ $message->id }}"
        wire:ignore
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
        wire:ignore
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
</div>
