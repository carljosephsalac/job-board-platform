<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');

Route::controller(JobController::class)->group(function() {
    Route::get('/jobs', 'index');
    Route::post('/jobs', 'store');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{id}', 'show');
    Route::get('/jobs/{id}/edit', 'edit');
    Route::patch('/jobs/{id}', 'update');
    Route::delete('/jobs/{id}', 'destroy');
});

// Route::resource('jobs', JobController::class);

// Route::resource('jobs', JobController::class, [
//     'except' => ['show']
// ]);

// Route::resource('jobs', JobController::class, [
//     'only' => ['store', 'update', 'destroy']
// ]);

Route::view('/contact', 'contact');
