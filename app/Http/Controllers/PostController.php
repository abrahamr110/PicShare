<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class PostController extends Controller
{
    public function showCreate()
    {
        return view('post_views.create');
    }

    public function doCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
        ], [
            'title.required' => 'El campo Titulo es requerido',
            'title.string' => 'El campo Titulo debe ser una cadena de caracteres',
            'title.max' => 'El campo Titulo debe tener al menos 255 caracteres',
            'content.required' => 'El campo Contenido es requerido',
            'content.string' => 'El campo Contenido debe ser una cadena de caracteres',
            'content.max' => 'El campo Contenido debe tener al menos 10000 caracteres',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('post.showIndex')->with('success', 'Post creado exitosamente.');
    }
}
