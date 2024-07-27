<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', fn() => redirect()->route('login'));

Route::get('/register', [RegisterUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

Route::get('/login', [SessionController::class, 'create'])->name('login'); // need login route name for auth middleware
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout.destroy');

Route::view('/home', 'home');
Route::view('/contact', 'contact');

Route::controller(JobController::class)->group(function() {
    Route::middleware('auth')->group(function() { #Step 5. Middleware Authorization
        Route::get('/jobs/create', 'create')->name('jobs.create');
        Route::post('/jobs', 'store')->name('jobs.store');
        Route::get('/jobs/{job}/edit', 'edit')->name('jobs.edit')->can('edit', 'job'); #Step 6. Policies
        // ->can('edit-job', 'job'); #Step 5. Middleware Authorization, can() method in routes
        Route::patch('/jobs/{job}', 'update')->name('jobs.update');
        Route::delete('/jobs/{job}', 'destroy')->name('jobs.destroy');
    });
    Route::get('/jobs', 'index')->name('jobs.index');
    Route::get('/jobs/{job}', 'show')->name('jobs.show');
});


# ROUTE RESOURCE
// Route::resource('jobs', JobController::class)->middleware('auth');

# EXCEPT
// Route::resource('jobs', JobController::class, [
//     'except' => ['show']
// ]);

# ONLY
// Route::resource('jobs', JobController::class, [
//     'only' => ['store', 'update', 'destroy']
// ]);