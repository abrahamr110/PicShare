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

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con los likes (un post puede tener muchos likes)
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Relación con los comentarios (un post puede tener muchos comentarios)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Método para obtener el número de likes de manera más sencilla
    public function getLikeCountAttribute()
    {
        return $this->likes()->count();
    }
}

