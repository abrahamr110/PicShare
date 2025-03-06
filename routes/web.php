<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::prefix('users')->group(base_path('routes/users/user.php'));
Route::prefix('posts')->group(base_path('routes/posts/post.php'));

Route::middleware(['auth'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
});


Route::middleware(['guest'])->group(function(){
    Route::get('/login', [UserController::class, 'showLogin'])->name('login');
    Route::get('/register', [UserController::class, 'showRegister'])->name('register');
});

