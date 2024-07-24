<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Edit Job : {{ $chosenJob->title }}</x-slot:heading>

    <form action="/jobs/{{ $chosenJob->id }}" method="POST" onsubmit="disableSubmitButton(this)">
        @csrf
        @method('patch')
        <div class="space-y-12">
            <div class="pb-12 border-b border-gray-900/10">
                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="relative sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" id="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 focus:outline-none"
                                    placeholder="Senior Laravel Developer" value="{{ old('title', $chosenJob->title) }}"
                                    required>
                            </div>
                        </div>
                        @error('title')
                            <p class="absolute text-xs italic text-red-600 -bottom-5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="relative sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="salary" id="salary"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 focus:outline-none"
                                    placeholder="₱100,000 Per Month" value="{{ old('salary', $chosenJob->salary) }}"
                                    required>
                            </div>
                        </div>
                        @error('salary')
                            <p class="absolute text-xs italic text-red-600 -bottom-5">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between mt-6 gap-x-6">
            <div class="flex gap-3">
                <x-button type="submit" color="blue">Update</x-button>
                <x-button href="/jobs/{{ $chosenJob->id }}">Cancel</x-button>
            </div>
            <x-button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" color="red">
                Delete
            </x-button>
            <x-modal>
                Are you sure you want to delete this job?
                <x-slot:buttons>
                    <x-button data-modal-hide="popup-modal" type="submit" color="red" form="delete-form">
                        Yes, I'm sure
                    </x-button>
                    <x-button data-modal-hide="popup-modal" type="button">
                        No, cancel
                    </x-button>
                </x-slot:buttons>
            </x-modal>
        </div>
    </form>
    <form action="/jobs/{{ $chosenJob->id }}" method="POST" class="hidden" id="delete-form"
        onsubmit="disableSubmitButton(this)">
        @csrf
        @method('delete')
    </form>
</x-layout>
