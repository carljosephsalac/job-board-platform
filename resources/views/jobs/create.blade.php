<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Create Job</x-slot:heading>

    <form action="/jobs" method="POST" onsubmit="disableSubmitButton(this)">
        @csrf
        <div class="space-y-12">
            <div class="pb-12 border-b border-gray-900/10">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <x-form-input type="text" name="title" id="title" placeholder="Senior Laravel Developer"
                            value="{{ old('title') }}" required />
                        <x-form-error name="title" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <x-form-input type="text" name="salary" id="salary" placeholder="₱100,000 Per Month"
                            value="{{ old('salary') }}" required />
                        <x-form-error name="salary" />
                    </x-form-field>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-start mt-6 gap-x-6">
            <x-button color="green" type="submit">Save</x-button>
            <x-button href="/jobs">Cancel</x-button>
        </div>
    </form>
</x-layout>
