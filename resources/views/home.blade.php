<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inicio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    @include('partials.header')
    <!-- home.blade.php -->
    <div class="min-h-screen bg-gray-100 flex flex-col items-center">
        <div class="w-full max-w-6xl p-6 mt-8">
            <h1 class="text-2xl font-semibold mb-6">Posts</h1>
            @foreach ($posts as $post)
                <div class="bg-white p-6 mb-4 rounded-lg shadow-lg">
                    <img src="{{ $post->image }}" alt="image" class="w-full">
                    <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
                    <p class="text-gray-700">{{ $post->description }}</p>

                    <!-- Formulario para comentar -->
                    <form action="{{ route('post.comment', $post->id) }}" method="POST">
                        @csrf
                        <textarea name="coment" rows="3" class="w-full p-2 border rounded-lg mt-2" required></textarea>                  
                        <button type="submit" class="bg-fuchsia-500 text-white px-4 py-2 rounded-lg hover:bg-fuchsia-600 mt-2">Comentar</button>                       
                    </form>

                    <!-- Mostrar comentarios -->
                    <div class="mt-4">
                        <h4 class="font-semibold">Comentarios:</h4>
                        @foreach ($post->comments as $comment)
                            <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->coment }}</p>
                        @endforeach
                    </div>
                    
                    <div class="flex flex-row items-center justify-end mt-2 w-full gap-1">
                        <!-- Formulario para dar like -->
                        <form action="{{ route('post.like', $post->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="text-fuchsia-500 hover:text-fuchsia-700 items-center">
                                <!-- Icono de corazón -->
                                <i class="fas fa-heart text-xl"></i>
                            </button>
                        </form>

                        <!-- Mostrar el número de likes -->
                        <span class="text-gray-600">{{ $post->likeCount }} likes</span>
                    </div>
                 
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>