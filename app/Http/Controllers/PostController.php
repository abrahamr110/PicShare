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
            'description' => 'required|string|max:10000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de la imagen
        ], [
            'title.required' => 'El campo Titulo es requerido',
            'title.string' => 'El campo Titulo debe ser una cadena de caracteres',
            'description.required' => 'El campo Descripción es requerido',
            'description.string' => 'El campo Descripción debe ser una cadena de caracteres',
            'image.image' => 'El archivo debe ser una imagen',
            'image.mimes' => 'La imagen debe tener un formato válido (jpeg, png, jpg, gif, svg)',
            'image.max' => 'La imagen no debe pesar más de 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Manejo de la imagen
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public'); // Almacena la imagen en el directorio public/posts          
        }

        // Crear el post con la imagen
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'image' => $imagePath,  // Guarda la ruta de la imagen
        ]);

        return redirect()->route('post.showProfile')->with('success', 'Post creado exitosamente.');
    }

    public function like(Post $post)
    {
        // Comprobar si el usuario está logueado
        if (!Auth()->check()) {
            return redirect()->route('user.showLogin')->with('error', 'Debes iniciar sesión para dar like.');
        }
        

        $user = Auth::user();

        if ($post->likes()->where('user_id', $user->id)->exists()) {
            $post->likes()->where('user_id', $user->id)->delete(); // Eliminar like si ya lo ha dado
        } else {
            $post->likes()->create([
                'user_id' => $user->id
            ]); // Crear like si no lo ha dado
        }

        return redirect()->back();
    }
    
    public function comment(Request $request, Post $post)
    {
        // Comprobar si el usuario está logueado
        if (!Auth::check()) {
            return redirect()->route('user.showLogin')->with('error', 'Debes iniciar sesión para comentar.');
        }

        // Validar el comentario
        $request->validate([
            'coment' => 'required|string|max:10000',
        ]);

        // Guardar el comentario en la base de datos
        $post->comments()->create([
            'user_id' => Auth::id(),
            'coment' => $request->coment,
        ]);

        return redirect()->route('home')->with('success', 'Comentario añadido con éxito!');
    }
}
