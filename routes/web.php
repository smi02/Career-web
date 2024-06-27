<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Mail\JobPoster;
use App\Models\Employer;
use App\Models\Info;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    $job = Info::first();
    TranslateJob::dispatch($job);
    return 'Done'; 
});

Route::view('/', 'welcome');

// Index
Route::controller(InfoController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('jobs/create', 'create')->middleware('auth');
    Route::get('jobs/{job}', 'show');
    Route::post('jobs', 'store')->middleware('auth');
    Route::get('jobs/{job}/edit', 'edit')
        ->middleware('auth')
        ->can('edit', 'job');
    Route::patch('jobs/{job}', 'update');
    Route::delete('jobs/{job}', 'destroy');
});

// Route::resource('jobs', InfoController::class)->only(['index', 'show']);
// Route::resource('jobs', InfoController::class)->except(['index', 'show'])->middleware('auth');

// Employer
Route::get('/employers', function () {
    $emp = Employer::with('info')->cursorPaginate(5);
    return view('jobs.employers', [
        'emp' => $emp
    ]);
});

// Show Employer
Route::get('employers/{id}', function ($id) {
    $emp = Employer::find($id);
    $employer = Employer::find($id)->info;
    return view('jobs.employer', ['employer' => $employer, 'emp' => $emp]);
});

// Register
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

// Profile
Route::get('/profile', [ProfileController::class, 'index']);

// Contact
Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);
