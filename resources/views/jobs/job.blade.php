<x-layout>
    <x-slot:heading>Job</x-slot:heading>

    <div class="bg-white px-5 py-5">
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
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($job->comment as $item)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{ $item->user->name }}</p>
                            <p class="mt-1 whitespace-pre-wrap text-xs leading-5 text-gray-500 ml-5">{{ $item->content }}</p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">{{ $item->user->email }}</p>
                        <p class="mt-1 whitespace-pre-wrap text-xs leading-5 text-gray-500 ml-5">{{ $item->created_at->format('H:i | d/m/Y') }}</p>
                    </div>
                </li>
            @endforeach
            @auth
                <li class="flex gap-x-6 py-5 px-5 flex-col">
                    <p class="text-sm font-semibold leading-6 text-gray-900 pb-4">{{ auth()->user()->name }}</p>
                    <form action="/comment/{{ $job->id }}" method="POST">
                        @csrf
                        <div class="flex min-w-0 gap-x-4 items-end">
                            <textarea class="px-3 py-3 rounded-md bg-gray-200 focus:bg-gray-100" name="content" id="content" cols="100"
                                rows="4" placeholder="write 1 comment ..."></textarea>
                            <x-form-button class="h-12" id="submit">Comment 🚀</x-form-button>
                        </div>
                    </form>
                </li>
            @endauth
        </ul>
    </div>

</x-layout>
