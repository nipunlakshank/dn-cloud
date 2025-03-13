<div
    x-data="{
        members: @entangle('chatMembers'),
    }"
    class="h-[80%] w-full">
    <div
        class="font-small flex h-full w-full flex-col gap-2 overflow-y-auto text-sm text-gray-500 dark:text-gray-400">
        <template x-for="member in members" :key="member.id">
            <div
                class="inline-flex w-full items-center gap-2 rounded-lg bg-gray-100 px-3 py-2 text-gray-900 dark:bg-gray-700 dark:text-white">
                <div class="flex w-full flex-col gap-2">
                    <div class="flex items-center justify-between gap-2">
                        <div>
                            <span x-text="member.name"></span>
                            <span x-text="'(' + member.role + ')'" class="whitespace-nowrap text-xs text-gray-400"></span>
                        </div>
                        <span x-show="member.id === Number({{ auth()->id() }})"
                            class="self-center text-center text-green-500">You</span>
                    </div>
                    <span class="text-xs" x-text="member.email"></span>
                </div>
                <button type="button"
                    x-show="member.canRemove"
                    x-on:click="$wire.removeMember(member.id)"
                    class="ms-auto inline-flex items-center justify-center rounded-full bg-gray-200 p-2 text-sm text-gray-900 hover:bg-red-500 hover:text-gray-100 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-red-500 dark:hover:text-white">
                    <svg width="10" height="10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </template>
    </div>
</div>
