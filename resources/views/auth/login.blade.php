<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>

    <form class="bg-white py-5 px-5" method="POST" action="/login">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for='email'>Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name='email' id='email' type='email' :value="old('email')" placeholder="Tom@example.com" />
                            <x-form-error name='email' />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" type='password' placeholder="***" />
                            <x-form-error name='password' />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Login</x-form-button>
        </div>
    </form>

</x-layout>
