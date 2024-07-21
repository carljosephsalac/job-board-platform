<?php

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

# INDEX
Route::get('/jobs', function() {
    // $jobs = Job::all(); // lazy loading
    // $jobs = Job::with('employer')->paginate(); // may page number yung pagination
    // $jobs = Job::with('employer')->cursor(); // mahaba yung url, maganda sa maramihang data
    $jobs = Job::with('employer')->latest()->simplePaginate(5); // eager loading
    return view('jobs.index', compact('jobs'));
});

# CREATE
Route::get('/jobs/create', function() {
    return view('jobs.create');
});

# SHOW
Route::get('/jobs/{id}', function($id) {
    $chosenJob = Job::find($id);
    return view('jobs.show', compact('chosenJob'));
});

# STORE
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
    return redirect('/jobs')->with('created', 'Created Successfully');
});

# EDIT
Route::get('/jobs/{id}/edit', function($id) {
    $chosenJob = Job::find($id);
    return view('jobs.edit', compact('chosenJob'));
});

# UPDATE
Route::patch('/jobs/{id}', function($id, Request $request) {
    $request->validate([
        'title' => 'required|min:3',
        'salary' => 'required|numeric'
    ]);
    $chosenJob = Job::findOrFail($id);
    $chosenJob->update([
        'title' => $request->title,
        'salary' => $request->salary
    ]);
    return redirect('/jobs/' . $chosenJob->id)->with('updated', 'Updated Successfully');
});
# UPDATE Route Model Binding
// Route::patch('/jobs/{chosenJob}', function(Request $request, Job $chosenJob) {
//     $request->validate([
//         'title' => 'required|min:3',
//         'salary' => 'required|numeric'
//     ]);
//     $chosenJob->update([
//         'title' => $request->title,
//         'salary' => $request->salary
//     ]);
//     return redirect('/jobs/' . $chosenJob->id);
// });

# DELETE
Route::delete('/jobs/{id}', function($id) {
    Job::findOrFail($id)->delete();
    return redirect('/jobs')->with('deleted', 'Deleted Successfully');
});

Route::get('/contact', function() {
    return view('contact');
});
