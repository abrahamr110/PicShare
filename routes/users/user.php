<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [UserController::class, 'showLogin'])->name('user.login');
Route::get('/register', [UserController::class, 'showRegister'])->name('user.showRegister');

Route::post('/login', [UserController::class, 'doLogin'])->name('user.doLogin');
Route::post('/register', [UserController::class, 'doRegister'])->name('user.doRegister');

Route::middleware(['auth'])->group(function(){
    Route::get('/index/{id}', [UserController::class, 'showIndex'])->name('user.showIndex');
    Route::get('/logout', [UserController::class, 'doLogout'])->name('user.doLogout');
});


