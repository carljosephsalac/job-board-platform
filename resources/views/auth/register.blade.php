<x-layout>
    <x-slot:title>Register</x-slot:title>
    <x-slot:heading>Register</x-slot:heading>

    <form action="{{ route('register.store') }}" method="POST" onsubmit="disableSubmitButton(this)">
        @csrf
        <div class="space-y-12">
            <div class="flex justify-center pb-12 mx-auto border-b border-gray-900/10 sm:w-[500px]">
                <div class="flex flex-col w-full gap-6">
                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>
                        <x-form-input type="text" name="first_name" id="first_name" :value="old('first_name')" />
                        <x-form-error name="first_name" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <x-form-input type="text" name="last_name" id="last_name" :value="old('last_name')" />
                        <x-form-error name="last_name" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <x-form-input type="email" name="email" id="email" :value="old('email')" />
                        <x-form-error name="email" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <x-form-input type="password" name="password" id="password" />
                        <x-form-error name="password" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <x-form-input type="password" name="password_confirmation" id="password_confirmation" />
                        <x-form-error name="password_confirmation" />
                    </x-form-field>

                    <div class="flex items-center justify-start mt-6 gap-x-6">
                        <x-button color="green" type="submit">Register</x-button>
                        <x-button href="/" color="blue">Already have an account</x-button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
