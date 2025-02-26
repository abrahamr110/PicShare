<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::prefix('users')->group(base_path('routes/users/user.php'));

