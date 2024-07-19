<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Job Description</x-slot:heading>

    <h2 class="text-lg font-bold ">{{ $chosenJob['title'] }}</h2>
    <p>This job pays ₱{{ $chosenJob['salary'] }} per month.</p>
</x-layout>
