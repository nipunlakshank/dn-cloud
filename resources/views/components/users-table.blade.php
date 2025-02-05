<div class="flex w-full h-full relative shadow-md sm:rounded-lg overflow-x-auto">
    <table class="w-full h-fit text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
        <thead class="z-20 sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Users
                </th>
                <th scope="col" class="px-6 py-3">
                    status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    {{ $user->id }}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->first_name." ".$user->last_name }}
                </th>
                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <form action="{{ route('user-status',['id'=>$user->id,"status"=>$user->is_active]) }}" method="GET">
                        @csrf
                        <button type="submit" class="w-full {{ $user->is_active ? "bg-green-500" : "bg-red-500" }}  px-3 py-2 rounded-md hover:brightness-100 active:brightness-80 brightness-90">
                            {{ $user->is_active ? "Active" : "Inactive" }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>