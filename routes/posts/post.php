<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::get('/', [PostController::class, 'showProfile'])->name('post.showProfile');
    Route::get('/create', [PostController::class, 'showCreate'])->name('post.showCreate');
    Route::post('/create', [PostController::class, 'doCreate'])->name('post.doCreate');
});