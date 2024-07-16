<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Job Listings</x-slot:heading>

    @isset($jobs)
        @foreach ($jobs as $job)
            <ul>
                <a href="/job/{{ $job['id'] }}">
                    <li>
                        <strong class="hover:underline">{{ $job['title'] }}</strong>
                    </li>
                </a>
            </ul>
        @endforeach
    @endisset

    @isset($chosenJob)
        <x-slot:heading>Job</x-slot:heading>
        <h2 class=" font-bold text-lg">{{ $chosenJob['title'] }}</h2>
        <p>This job pays {{ $chosenJob['salary'] }} per month.</p>
    @endisset
</x-layout>
