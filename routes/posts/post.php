<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function(){  
    Route::get('/login', [UserController::class, 'showLogin'])->name('user.showLogin');
});

Route::middleware(['auth'])->group(function(){  
    Route::get('/profile',[PostController::class,'showProfile'])->name('post.showProfile');
    Route::get('/create', [PostController::class, 'showCreate'])->name('post.showCreate');
    Route::post('/create', [PostController::class, 'doCreate'])->name('post.doCreate');
    Route::post('/{post}/like', [PostController::class, 'like'])->name('post.like');
    Route::post('/{post}/comment', [PostController::class, 'comment'])->name('post.comment');
    Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('post.delete');
});