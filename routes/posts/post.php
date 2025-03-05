<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::get('/posts', [PostController::class, 'showIndex'])->name('post.showIndex');
    Route::get('/posts/create', [PostController::class, 'showCreate'])->name('post.showCreate');
    Route::post('/posts/create', [PostController::class, 'doCreate'])->name('post.doCreate');
});