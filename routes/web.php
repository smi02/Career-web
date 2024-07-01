<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Mail\JobPoster;
use App\Models\Company;
use App\Models\Info;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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

    Route::post('/comment/{job}', 'store_comment');
    Route::delete('/comment/{comment}/{job}', 'destroy_comment');
});

// Route::resource('jobs', InfoController::class)->only(['index', 'show']);
// Route::resource('jobs', InfoController::class)->except(['index', 'show'])->middleware('auth');

// Company
Route::get('/companys', function () {
    $com = Company::with('user.job')->cursorPaginate(5);
    return view('jobs.companys', [
        'com' => $com
    ]);
});

// Show Company
Route::get('companys/{id}', function ($id) {
    $com = Company::find($id);
    return view('jobs.company', ['com' => $com]);
});

// Register
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

// Dashboard
Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->admin) {
        return view('auth.dashboard');
    } else {
        abort(403);
    }
})->middleware('auth');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/profile/{user}/edit', [ProfileController::class, 'profile_edit'])->middleware('auth');
Route::patch('/profile/{user}', [ProfileController::class, 'profile_patch'])->middleware('auth');
Route::delete('/profile/{user}', [ProfileController::class, 'profile_delete'])->middleware('auth');
Route::get('/dashboard/user', [ProfileController::class, 'user'])->middleware('auth');
Route::delete('/dashboard/user/{user}', [ProfileController::class, 'destroy_user'])->middleware('auth');
Route::get('/dashboard/company', [ProfileController::class, 'company'])->middleware('auth');
Route::delete('/dashboard/company/{company}', [ProfileController::class, 'destroy_company'])->middleware('auth');
Route::get('/dashboard/job', [ProfileController::class, 'job'])->middleware('auth');


// Contact:Comment
Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);
