<x-layout>
    <x-slot:title>Login</x-slot:title>
    <x-slot:heading>Login</x-slot:heading>

    <form action="{{ route('login.store') }}" method="POST" onsubmit="disableSubmitButton(this)">
        @csrf
        <div class="space-y-12">
            <div class="flex justify-center pb-12 mx-auto border-b border-gray-900/10 sm:w-[500px]">
                <div class="flex flex-col w-full gap-6">
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <x-form-input type="email" name="email" id="email" value="{{ old('email') }}" />
                        <x-form-error name="email" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <x-form-input type="password" name="password" id="password" />
                        <x-form-error name="password" />
                    </x-form-field>

                    <div class="flex items-center justify-start mt-6 gap-x-6">
                        <x-button color="green" type="submit">Login</x-button>
                        <x-button href="{{ route('register.create') }}" color="blue">Create Account</x-button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
