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
                        <td class="px-6 py-4"><a href="users/{{ $item['id'] }}" class="
                            py-2 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none 
                            bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 
                            focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 
                            dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                View
                            </a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-5 mx-2">{{ $users->links() }}</div>
    </div>
</x-dash-board>