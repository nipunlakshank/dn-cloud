<div
    x-data="{
        isGroup: @json($isGroup),
        authId: @json(auth()->id()),
        hasMessage: @json(!empty($message)),
        sender: @entangle('sender'),
        text: @entangle('text'),
        isReport: @entangle('isReport'),
    }"
    class="flex max-w-full gap-1 text-sm font-normal text-gray-700 dark:text-gray-300">

    <div class="inline-flex w-full items-end gap-1">
        <div class="inline">
            <template x-if="sender && sender.id !== authId">
                <span class="font-semibold" x-text="sender.first_name + ': '"></span>
            </template>

            @if ($message)
                <template x-if="hasMessage && sender && sender.id === authId">
                    {{--
                        BUG: below is message-ticks component. when its included as a separate livewire compoenent, the page become unresponsive.
                    --}}
                    <div
                        x-data="{
                            state: @entangle('state'),
                        }"
                        x-init="() => {
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
                        }"
                        x-bind:class="{
                            'text-blue-500': state === 'read',
                            'text-gray-400': state !== 'read'
                        }"
                        class="relative h-[18px] w-[24px]">
                        <svg class="absolute left-0 top-0 h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12L9 16L19 6" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <template x-if="state === 'delivered' || state === 'read'">
                            <svg
                                x-bind:class="{
                                    'text-blue-500': state === 'read',
                                    'text-gray-400': state !== 'read'
                                }"
                                class="absolute left-[0.33rem] top-0 h-[18px] w-[18px]"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12L9 16L19 6" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </template>
                    </div>
                </template>
            @endif
        </div>

        <template x-if="isReport">
            <div class='inline-flex gap-1 text-red-400'>
                <svg width='18' height='18' viewBox='0 0 24 24' fill='currentColor'
                    xmlns='http://www.w3.org/2000/svg'>
                    <path fill-rule='evenodd' clip-rule='evenodd'
                        d='M9 7V2.22117C8.81709 2.31517 8.64812 2.43766 8.5 2.58579L4.58579 6.5C4.43766 6.64812 4.31517 6.81709 4.22117 7H9ZM11 7V2H18C19.1046 2 20 2.89543 20 4V20C20 21.1046 19.1046 22 18 22H6C4.89543 22 4 21.1046 4 20V9H9C10.1046 9 11 8.10457 11 7ZM10 16C10 15.4477 9.55228 15 9 15C8.44772 15 8 15.4477 8 16V18C8 18.5523 8.44772 19 9 19C9.55228 19 10 18.5523 10 18V16ZM12 11C12.5523 11 13 11.4477 13 12V18C13 18.5523 12.5523 19 12 19C11.4477 19 11 18.5523 11 18V12C11 11.4477 11.4477 11 12 11ZM16 15C16 14.4477 15.5523 14 15 14C14.4477 14 14 14.4477 14 15V18C14 18.5523 14.4477 19 15 19C15.5523 19 16 18.5523 16 18V15Z'
                        fill='currentColor' />
                </svg>
                <span class='italic'>Report</span>
            </div>
        </template>

        <template x-if="!isReport">
            <span class="inline max-w-full truncate"
                x-text="text"></span>
        </template>
    </div>
</div>
