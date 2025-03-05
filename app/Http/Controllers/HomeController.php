<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['likes', 'comments'])->get();
        return view('home', compact('posts'));
    }
}

