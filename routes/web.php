<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TownPlanningController;
use App\Http\Controllers\SecureController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SecureController::class, 'index'])->name('login');
    Route::post('/', [SecureController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('dashboard');
});

Route::get('/register', [SecureController::class , 'register'])->name('register');
Route::post('/register-user', [SecureController::class , 'register_user'])->name('register-user');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/unit', [TownPlanningController::class, 'index'])->name('town-planning');
    Route::get('/logout', [SecureController::class, 'logout'])->name('logout');
});