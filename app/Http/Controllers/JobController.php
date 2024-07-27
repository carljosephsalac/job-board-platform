<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        // $jobs = Job::all(); // lazy loading
        // $jobs = Job::with('employer')->paginate(); // may page number yung pagination
        // $jobs = Job::with('employer')->cursor(); // mahaba yung url, maganda sa maramihang data
        $jobs = Job::with('employer')->latest()->simplePaginate(5); // eager loading
        return view('jobs.index', compact('jobs'));
    }

    public function store(Request $request)
    {
        $validated= $request->validate([
            'title' => 'required|min:3',
            'salary' => 'required|numeric'
        ]);

        $validated['employer_id'] = auth()->user()->employer->id;

        Job::create($validated);

        return redirect('/jobs')->with('created', 'Created Successfully');
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        # Step 1. inline authorization
        // if (Auth::guest())
        // {
        //     return redirect('/');
        // }

        // if ($job->employer->user->isNot(Auth::user())) { // inline authorization
        //     abort(403);
        // }

        # Step 2. GATES
        // Gate::define('edit-job', function(User $user, Job $job) {
        //     // if the user who created the job is the currently signed in user.
        //     return $job->employer->user->is($user);
        // });

        // Gate::authorize('edit-job', $job); // if false it will abort an error message

        # Step 4. can, can, can (Model)
        // if (Auth::user()->cannot('edit-job', $job)) {
        //     abort(401);
        // }

        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|min:3',
            'salary' => 'required|numeric'
        ]);

        session(['old_updated_at' => $job->updated_at]); // store old updated_at in session

        $job->update([
            'title' => $request->title,
            'salary' => $request->salary
        ]);

        return redirect('/jobs/' . $job->id)->with('updated', 'Updated Successfully');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs')->with('deleted', 'Deleted Successfully');
    }
}

# NO ROUTE MODEL BINDING
/*
    public function show($id)
    {
        $job = Job::find($id); // or findOrFail()
        return view('jobs.show', compact('job'));
    }
*/
