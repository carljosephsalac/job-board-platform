<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');

Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);

// Route::controller(JobController::class)->group(function() {
//     Route::get('/jobs', 'index');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{id}', 'show');
//     Route::get('/jobs/{id}/edit', 'edit');
//     Route::patch('/jobs/{id}', 'update');
//     Route::delete('/jobs/{id}', 'destroy');
// });

# EXCEPT
// Route::resource('jobs', JobController::class, [
//     'except' => ['show']
// ]);

# ONLY
// Route::resource('jobs', JobController::class, [
//     'only' => ['store', 'update', 'destroy']
// ]);