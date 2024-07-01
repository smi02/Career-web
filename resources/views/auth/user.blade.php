<x-dash-board>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">email</th>
                    <th scope="col" class="px-6 py-3">company</th>
                    <th scope="col" class="px-6 py-3">admin</th>
                    <th scope="col" class="px-6 py-3">Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item['name'] }}</td>
                        <td class="px-6 py-4">{{ $item['email'] }}</td>
                        <td class="px-6 py-4">{{ $item->company->name_com }}</td>
                        @if ($item['admin'])
                        <td class="px-6 py-4">admin</td>
                        @else
                        <td class="px-6 py-4">user</td>
                        @endif
                        <form action="/dashboard/user/{{ $item['id'] }}" method="POST">
                            @csrf
                            @method('DELETE')
                            @if ($item['admin'])
                            <td class="px-6 py-4"><button disabled class="
                                py-2 px-5 me-2 mb-2 text-sm font-medium text-white focus:outline-none 
                                bg-gray-500 rounded-lg border border-gray-200 cursor-not-allowed
                                focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 
                                dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    delete
                                </button></td>
                            @else
                            <td class="px-6 py-4"><button class="
                                py-2 px-5 me-2 mb-2 text-sm font-medium text-white focus:outline-none 
                                bg-red-500 rounded-lg border border-gray-200 hover:bg-red-300
                                focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 
                                dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    delete
                                </button></td>
                            @endif
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-5 mx-2">{{ $users->links() }}</div>
    </div>
</x-dash-board>