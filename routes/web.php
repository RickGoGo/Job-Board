<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EmployerJobController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('jobs.index');
})->name('home');

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('auth.store');
Route::resource('jobs', JobController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function ($group) {
    Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

    Route::resource('employers', EmployerController::class)->only(['create', 'store']);
    Route::resource('employer-jobs', EmployerJobController::class)->middleware('employer');
    Route::resource('job.application', ApplicationController::class)->only(['create', 'store', 'destroy']);
    Route::get('my-job-applications', [ApplicationController::class, 'index'])->name('my-application.index');
});
