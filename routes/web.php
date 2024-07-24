<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('login.create'));

Route::get('/register', [RegisterUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

Route::get('/login', [SessionController::class, 'create'])->name('login.create');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout.destroy');

Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);

/* Route::controller(JobController::class)->group(function() {
    Route::get('/jobs', 'index');
    Route::post('/jobs', 'store');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{id}', 'show');
    Route::get('/jobs/{id}/edit', 'edit');
    Route::patch('/jobs/{id}', 'update');
    Route::delete('/jobs/{id}', 'destroy');
}); */

# EXCEPT
// Route::resource('jobs', JobController::class, [
//     'except' => ['show']
// ]);

# ONLY
// Route::resource('jobs', JobController::class, [
//     'only' => ['store', 'update', 'destroy']
// ]);