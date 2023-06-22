<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(JobController::class)->group(function() {
    Route::get('/jobs', 'index')->name('job.all');
    Route::get('/all-jobs', 'getAll')->name('jobs');

    Route::prefix('/job')->group(function() {
        Route::get('/new', 'create')->name('job.create');
        Route::post('/save', 'store')->name('job.save');
        
        Route::get('/single/{job}', 'getOne')->name('job');
        Route::get('/{job}', 'show')->name('job.one');
    });
});