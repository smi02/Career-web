<x-layout>
    <x-slot:heading>Employer</x-slot:heading>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emp as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item['name_emp'] }}</td>
                        @if ($item->info->isEmpty())
                            <td class="px-6 py-4"><a
                                    class="text-white bg-gray-500 font-medium rounded-md text-sm px-3 py-2 me-2 mb-2 pointer-events-none">
                                    link job
                                </a></td>
                        @else
                            <td class="px-6 py-4"><a href="employers/{{ $item['id'] }}"
                                    class="text-white bg-blue-500 font-medium rounded-md text-sm px-3 py-2 me-2 mb-2 dark:bg-blue-400
                                hover:bg-blue-700 focus:ring-4 focus:ring-blue-300  dark:hover:bg-blue-600 
                                focus:outline-none dark:focus:ring-blue-800">
                                    link job
                                </a></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-5 mx-2">{{ $emp->links() }}</div>
    </div>
</x-layout>
