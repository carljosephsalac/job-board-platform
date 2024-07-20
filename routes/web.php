<?php

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function() {
    // $jobs = Job::all(); // lazy loading
    // $jobs = Job::with('employer')->paginate(); // may page number yung pagination
    // $jobs = Job::with('employer')->cursor(); // mahaba yung url, maganda sa maramihang data
    $jobs = Job::with('employer')->latest()->simplePaginate(5); // eager loading
    return view('jobs.index', compact('jobs'));
});

Route::get('/jobs/create', function() {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function($id) {
    $chosenJob = Job::find($id);
    return view('jobs.show', compact('chosenJob'));
});

Route::post('/jobs', function(Request $request) {
    $request->validate([
        'title' => 'required|min:3',
        'salary' => 'required|numeric'
    ]);

    Job::create([
        'employer_id' => 1,
        'title' => $request->title,
        'salary' => $request->salary
    ]);

    return redirect('/jobs');
});

Route::get('/contact', function() {
    return view('contact');
});
