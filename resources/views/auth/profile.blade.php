<x-layout>
    <x-slot:heading>Profile</x-slot:heading>


    <div class="py-4 px-5 bg-white">
        <div class="mt-2">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->name }}
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Company</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->company->name_com }}</dd>
                </div>
                <div class="px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <p class="mt-6">
                        <a href='/profile/{{$user->id}}/edit'
                            class="relative inline-flex items-center px-2 py-2 cursor-pointer
                text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md leading-5 
                hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 
                focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out 
                duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800">Edit</a>
                    </p>
                </div>
            </dl>
        </div>
    </div>

</x-layout>
