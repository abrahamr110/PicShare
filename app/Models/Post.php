<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Asegúrate de que 'title' esté en el arreglo $fillable
    protected $fillable = [
        'title',         // Título del post
        'description',   // Descripción del post
        'publish_date',  // Fecha de publicación
        'n_likes',       // Número de likes
        'user_id',       // ID del usuario asociado
        'image',         // Imagen asociada al post (si la tienes)
    ];
}

