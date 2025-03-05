<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="min-h-screen bg-gray-100 flex flex-col items-center">
    <!-- Contenedor principal -->
    <div class="w-full max-w-4xl p-6 mt-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center mb-6">Crear un Nuevo Post</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario para crear post -->
        <form action="{{ route('post.doCreate') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold">Título</label>
                <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded-lg" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-semibold">Contenido</label>
                <textarea name="content" id="content" rows="5" class="w-full p-2 border border-gray-300 rounded-lg" required></textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between">
                <a href="{{ route('user.showProfile') }}" class="bg-gray-400 text-white px-6 py-3 rounded-lg hover:bg-gray-500">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
                    Publicar
                </button>
            </div>
        </form>
    </div>
</div>


</body>
</html>
