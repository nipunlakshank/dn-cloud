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
