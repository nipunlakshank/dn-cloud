<div class="sm:max-h-1/2 relative flex h-full w-full overflow-x-auto shadow-md sm:rounded-lg">
    <table
        class="h-fit w-full rounded-lg text-left text-sm text-gray-500 max-sm:h-fit rtl:text-right dark:text-gray-400">
        <thead class="sticky top-0 z-20 bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    wallet name
                </th>
                <th scope="col" class="px-6 py-3">
                    status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wallets as $wallet)
                @can('view', App\Models\Wallet::class, $wallet)
                    <tr
                        class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $wallet->id }}
                        </td>
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">

                            {{ $wallet->name }}
                        </th>
                        <td class="whitespace-nowrap px-6 py-4 text-gray-900 dark:text-white">
                            <form
                                action="{{ route('wallet-status', ['id' => $wallet->id, 'status' => $wallet->is_active]) }}"
                                method="GET">
                                @csrf
                                <button type="submit"
                                    class="{{ $wallet->is_active ? 'bg-green-500' : 'bg-red-500' }} active:brightness-80 w-full rounded-md px-3 py-2 brightness-90 hover:brightness-100">
                                    {{ $wallet->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endcan
            @endforeach
        </tbody>
    </table>
</div>

