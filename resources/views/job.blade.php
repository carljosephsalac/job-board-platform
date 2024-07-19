<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Job Listings</x-slot:heading>

    @isset($jobs)
        <div class="space-y-5">
            @foreach ($jobs as $job)
                <a href="/job/{{ $job['id'] }}"
                    class="block px-4 py-4 border border-gray-400 rounded-lg hover:border-gray-800">
                    <div class="font-bold text-blue-500">{{ $job->employer->name }}</div>
                    <strong>{{ $job['title'] }}</strong>: Pays ₱{{ $job['salary'] }} per month.
                </a>
            @endforeach
            <div>{{ $jobs->links() }}</div>
        </div>
    @endisset

    @isset($chosenJob)
        <x-slot:heading>Job</x-slot:heading>
        <h2 class="text-lg font-bold ">{{ $chosenJob['title'] }}</h2>
        <p>This job pays {{ $chosenJob['salary'] }} per month.</p>
    @endisset
</x-layout>
