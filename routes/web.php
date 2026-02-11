<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ApplicantController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return Inertia::render('Welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [JobPostController::class, 'index'])
        ->name('dashboard');

    // Job Posts
    Route::get('/jobposts/create', [JobPostController::class, 'create'])
        ->name('jobposts.create');

    Route::post('/jobposts', [JobPostController::class, 'store'])
        ->name('jobposts.store');

    // Applicant Tracker
    Route::get('/applicants/create/{jobPost}', [ApplicantController::class, 'create'])
        ->name('applicants.create');

    Route::post('/applicants', [ApplicantController::class, 'store'])
        ->name('applicants.store');

});

require __DIR__ . '/auth.php';
