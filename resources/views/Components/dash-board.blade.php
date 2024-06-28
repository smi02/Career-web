<x-layout>
    <x-slot:heading>
        Dashboard
    </x-slot:heading>

    <div class="bg-white px-5 py-5 flex">
        <div class="w-1/6 px-5 py-5">
            <ul class="">
                <li class="">
                    <x-dash-link href="/dashboard/user" :active="request()->is('dashboard/user')">Users</x-dash-link>
                </li>
                <hr>
                <li class="">
                    <x-dash-link href="/dashboard/company" :active="request()->is('dashboard/company')">Company</x-dash-link>
                </li>
                <hr>
                <li class="">
                    <x-dash-link href="/dashboard/job" :active="request()->is('dashboard/job')">Jobs</x-dash-link>
                </li>
            </ul>
        </div>

        <div class="w-5/6">
            {{ $slot }}
        </div>

    </div>

</x-layout>
