<x-layout>
    <x-slot:heading>Company job</x-slot:heading>

    <div class="relative overflow-x-auto">
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">{{ $com['name_com'] }}.</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Job details.</p>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name Job</th>
                    <th scope="col" class="px-6 py-3">Salary</th>
                    <th scope="col" class="px-6 py-3">Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($com->job as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->title }}</td>
                        <td class="px-6 py-4">{{ $item['salary'] }}</td>
                        <td class="px-6 py-4"><a href="/jobs/{{ $item['id'] }}"
                                class="
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
        {{-- <div class="my-5 mx-2">{{ $company->links() }}</div> --}}
    </div>

</x-layout>
