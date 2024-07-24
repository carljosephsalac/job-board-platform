<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

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
        $request->validate([
            'title' => 'required|min:3',
            'salary' => 'required|numeric'
        ]);
        Job::create([
            'employer_id' => 1,
            'title' => $request->title,
            'salary' => $request->salary
        ]);
        return redirect('/jobs')->with('created', 'Created Successfully');
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show($id)
    {
        $chosenJob = Job::find($id);
        return view('jobs.show', compact('chosenJob'));
    }

    public function edit($id)
    {
        $chosenJob = Job::find($id);
        return view('jobs.edit', compact('chosenJob'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'salary' => 'required|numeric'
        ]);

        $chosenJob = Job::findOrFail($id);

        session(['old_updated_at' => $chosenJob->updated_at]); // store old updated_at in session

        $chosenJob->update([
            'title' => $request->title,
            'salary' => $request->salary
        ]);

        return redirect('/jobs/' . $chosenJob->id)->with('updated', 'Updated Successfully');
    }
    # UPDATE Route Model Binding
    // public function update(Job $chosenJob, Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|min:3',
    //         'salary' => 'required|numeric'
    //     ]);
    //     $chosenJob->update([
    //         'title' => $request->title,
    //         'salary' => $request->salary
    //     ]);
    //     return redirect('/jobs/' . $chosenJob->id)->with('updated', 'Updated Successfully');
    // }

    public function destroy($id)
    {
        Job::findOrFail($id)->delete();
        return redirect('/jobs')->with('deleted', 'Deleted Successfully');
    }
}