<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Job Description</x-slot:heading>

    @session('updated')
        @unless (session('old_updated_at')->eq($chosenJob->updated_at))
            <x-alert color="blue">{{ $value }}</x-alert>
        @endunless
    @endsession

    <h2 class="text-lg font-bold ">{{ $chosenJob->title }}</h2>
    <p>This job pays ₱{{ $chosenJob->salary }} per month.</p>
    <x-button class="mt-5" href="/jobs/{{ $chosenJob->id }}/edit" color="blue">Edit Job</x-button>
</x-layout>
