<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [UserController::class, 'showLogin'])->name('user.showLogin');
    Route::get('/register', [UserController::class, 'showRegister'])->name('user.showRegister');

    Route::post('/login', [UserController::class, 'doLogin'])->name('user.doLogin');
    Route::post('/register', [UserController::class, 'doRegister'])->name('user.doRegister');
});


Route::middleware(['auth'])->group(function(){
    Route::get('/profile/{id}', [UserController::class, 'showProfile'])->name('user.showProfile');
    Route::get('/logout', [UserController::class, 'doLogout'])->name('user.doLogout');
    Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('user.showDashboard');
});


