<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\JobPostController;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [JobPostController::class, 'index'])
        ->name('dashboard');

    Route::get('/jobposts/create', [JobPostController::class, 'create'])
        ->name('jobposts.create');

    Route::post('/jobposts', [JobPostController::class, 'store'])
        ->name('jobposts.store');

});

require __DIR__.'/auth.php';
