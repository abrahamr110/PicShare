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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de la imagen
        ], [
            'title.required' => 'El campo Titulo es requerido',
            'title.string' => 'El campo Titulo debe ser una cadena de caracteres',
            'content.required' => 'El campo Contenido es requerido',
            'content.string' => 'El campo Contenido debe ser una cadena de caracteres',
            'image.image' => 'El archivo debe ser una imagen',
            'image.mimes' => 'La imagen debe tener un formato válido (jpeg, png, jpg, gif, svg)',
            'image.max' => 'La imagen no debe pesar más de 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Manejo de la imagen
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Guarda la imagen en el directorio 'posts'
            $imagePath = $image->store('posts', 'public');
        }

        // Crear el post con la imagen
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
            'image' => $imagePath,  // Guarda la ruta de la imagen
        ]);

        return redirect()->route('post.showIndex')->with('success', 'Post creado exitosamente.');
    }
}
