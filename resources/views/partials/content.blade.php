<div class="min-h-screen bg-gray-100 flex flex-col items-center">
    <div class="w-full max-w-6xl p-6 mt-8">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Sección de Información del Usuario -->
            <div class="bg-white p-6 rounded-lg shadow-lg w-full md:w-1/3">
                <div class="text-center">                 
                    <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>
            </div>

            <!-- Sección de Posts del Usuario -->
            <div class="bg-white p-6 rounded-lg shadow-lg w-full md:w-2/3">
                <h3 class="text-xl font-semibold mb-4">Mis Posts</h3>

                <!-- Botón para crear nuevo post -->
                <a href="{{ route('post.showCreate') }}" class="bg-fuchsia-500 text-white px-6 py-3 rounded-lg hover:bg-fuchsia-700 mb-4 inline-block">
                    Crear Nuevo Post
                </a>

                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                        {{ session('success') }}1
                    </div>
                @endif

                <!-- Lista de Posts -->
                @if ($user->posts->count() > 0)
                    <div class="space-y-4">
                        @foreach ($user->posts as $post)
                            <div class="p-4 border border-gray-200 rounded-lg">
                                <h4 class="font-semibold text-lg">{{ $post->title }}</h4>
                                <p class="text-gray-600">{{ $post->description }}</p>
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Imagen" class="w-36 h-36 rounded-full mx-auto my-auto mb-4">
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">Aún no has añadido ningún post.</p>
                @endif
            </div>
        </div>
    </div>
</div>


