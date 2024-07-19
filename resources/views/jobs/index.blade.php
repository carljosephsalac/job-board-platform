<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Job Listings</x-slot:heading>

    <div class="space-y-5">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}"
                class="block px-4 py-4 border border-gray-400 rounded-lg hover:border-gray-800">
                <div class="font-bold text-blue-500">{{ $job->employer->name }}</div>
                <strong>{{ $job['title'] }}</strong>: Pays ₱{{ $job['salary'] }} per month.
            </a>
        @endforeach
        <div>{{ $jobs->links() }}</div>
    </div>
</x-layout>
