<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Job Description</x-slot:heading>

    @session('updated')
        @unless (session('old_updated_at')->eq($job->updated_at))
            <x-alert color="blue">{{ $value }}</x-alert>
        @endunless
    @endsession

    <h2 class="text-lg font-bold ">{{ $job->title }}</h2>
    <p>This job pays ₱{{ $job->salary }} per month.</p>

    {{-- Step 4. can, can, can (Blade directives) --}}
    {{-- @can('edit-job', $job)
        <x-button class="mt-5" href="/jobs/{{ $job->id }}/edit" color="blue">Edit Job</x-button>
    @endcan --}}

    {{-- Step 6. Policies --}}
    @can('edit', $job)
        <x-button class="mt-5" href="/jobs/{{ $job->id }}/edit" color="blue">Edit Job</x-button>
    @endcan
    <x-button class="mt-5" href="{{ route('jobs.index') }}">Back</x-button>
</x-layout>
