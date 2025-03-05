<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user(); // Obtener usuario autenticado

        if (!$user) {
            return redirect()->route('login'); // Si no hay usuario, redirige a login
        }

        $user = User::with('posts')->find($user->id); // Carga los posts correctamente

        return view('user_views.profile', compact('user'));
    }

    public function showCreate()
    {
        return view('post_views.create'); // Solo muestra la vista del formulario de creación
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

        // Crear el post con el usuario autenticado
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(), // Asigna el post al usuario autenticado
        ]);

        return redirect()->route('user.profile')->with('success', 'Post creado exitosamente.');

    }
}
