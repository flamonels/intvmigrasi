<?php

use App\Http\Controllers\SecureController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SecureController::class, 'index'])->name('login');
    Route::post('/', [SecureController::class, 'login']);
});