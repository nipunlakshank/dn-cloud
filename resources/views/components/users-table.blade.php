<div class="relative flex h-full w-full overflow-x-auto shadow-md sm:rounded-lg">
    <table class="h-fit w-full rounded-lg text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="sticky top-0 z-20 bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 max-[990px]:px-3 max-sm:px-2">
                    Id
                </th>
                <th scope="col" class="px-6 py-3 max-[990px]:px-3 max-sm:px-2">
                    Users
                </th>
                <th scope="col" class="px-6 py-3 max-[990px]:px-3 max-sm:px-2">
                    status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr
                    class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 max-[990px]:px-3 max-sm:px-2">
                        {{ $user->id }}
                    </td>
                    <th scope="row"
                        class="flex flex-col whitespace-nowrap px-6 py-4 font-medium text-gray-900 max-[990px]:px-3 max-sm:px-2 dark:text-white">
                        <span class="flex items-center gap-2">
                            {{ $user->first_name . ' ' . $user->last_name }}
                            <span class="text-sm text-gray-500 dark:text-gray-400"> - {{ $user->role() }} </span>
                            @if ($user->is(auth()->user()))
                                <span class="text-xs text-gray-500 dark:text-gray-400"> (You) </span>
                            @endif
                        </span>
                        <span class="text-xs">
                            {{ $user->email }}
                        </span>
                    </th>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900 max-[990px]:px-3 max-sm:px-2 dark:text-white">
                        @can('changeRole', $user)
                            <form action="{{ route('user-status', ['id' => $user->id, 'status' => $user->is_active]) }}"
                                method="GET">
                                @csrf
                                <button type="submit"
                                    class="{{ $user->is_active ? 'bg-green-500' : 'bg-red-500' }} active:brightness-80 w-full rounded-md px-3 py-2 brightness-90 hover:brightness-100">
                                    {{ $user->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        @endcan
                        @cannot('changeRole', $user)
                            <span
                                class="{{ $user->is_active ? 'bg-green-500' : 'bg-red-500' }} w-full rounded-md px-3 py-2">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        @endcannot
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
