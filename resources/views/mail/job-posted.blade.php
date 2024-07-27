<h2>
    {{ $job->title }}
</h2>

<p>
    Congrats! Your job is now live on our website.
</p>
<p>
    {{-- <a href="{{ url('/jobs/' . $job->id) }}">View your job listing</a> --}}
    <a href="{{ route('jobs.show', $job->id) }}">View your job listing</a>
</p>
