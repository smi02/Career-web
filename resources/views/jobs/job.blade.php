<x-layout>
    <x-slot:heading>Job</x-slot:heading>


    <h2 class="font-bold text-lg">{{ $job->title }}</h2>
    <p>This job pays {{ $job->salary }} per year.</p>
    @can('edit', $job)
        <p class="mt-6">
            <a href='/jobs/{{ $job->id }}/edit' 
                class="relative inline-flex items-center px-2 py-2 cursor-pointer
        text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md leading-5 
        hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 
        focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out 
        duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800">Edit</a>
        </p>
    @endcan
</x-layout>
