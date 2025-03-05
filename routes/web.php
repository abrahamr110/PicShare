<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('users')->group(base_path('routes/users/user.php'));
Route::prefix('posts')->group(base_path('routes/posts/post.php'));

