<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Job Listings</x-slot:heading>

    @isset($jobs)
        <div class="space-y-5">
            @foreach ($jobs as $job)
                <a href="/job/{{ $job['id'] }}"
                    class="border border-gray-400 block rounded-lg px-4 py-4 hover:border-gray-800">
                    <div class="text-blue-500 font-bold">{{ $job->employer->name }}</div>
                    <strong>{{ $job['title'] }}</strong>: Pays ₱{{ $job['salary'] }} per month.
                </a>
            @endforeach
        </div>
    @endisset

    @isset($chosenJob)
        <x-slot:heading>Job</x-slot:heading>
        <h2 class=" font-bold text-lg">{{ $chosenJob['title'] }}</h2>
        <p>This job pays {{ $chosenJob['salary'] }} per month.</p>
    @endisset
</x-layout>
