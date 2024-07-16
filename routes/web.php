<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/job', function() {
    $jobs = Job::all();
    return view('job', compact('jobs'));
});

Route::get('/job/{id}', function($id) {
    $chosenJob = Job::find($id);

    return view('job', compact('chosenJob'));

    // foreach ($jobs as $job) // using foreach
    // {
    //     if ($job['id'] == $id)
    //     {
    //         dd($job);
    //     }
    // }

    // $job = Arr::first($jobs, function($job) use ($id) { // using use()
    //     return $job['id'] == $id;
    // });
    // dd($job);
});

Route::get('/contact', function() {
    return view('contact');
});