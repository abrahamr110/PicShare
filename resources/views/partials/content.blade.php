<div class="min-h-screen bg-gray-100 flex flex-col items-center">
    <!-- Dashboard Content -->
    <div class="flex flex-col md:flex-row w-full max-w-7xl p-6 mt-8">
        <!-- User Info -->
        <div class="bg-white p-6 rounded-lg shadow-lg w-full md:w-1/3">
            <div class="text-center">
                <img src="{{ asset('images/user-avatar.png') }}" alt="Avatar" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>
        </div>

        <!-- User Posts -->
        <div class="bg-white p-6 rounded-lg shadow-lg w-full md:w-2/3 md:ml-8 mt-6 md:mt-0">
            <h3 class="text-xl font-semibold mb-4">Mis Posts</h3>
            @if ($user->posts->count() > 0)
                <div class="space-y-4">
                    @foreach ($user->posts as $post)
                        <div class="p-4 border border-gray-200 rounded-lg">
                            <h4 class="font-semibold text-lg">{{ $post->title }}</h4>
                            <p class="text-gray-600">{{ $post->content }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">Aún no has añadido ningún post.</p>
            @endif

            <!-- Add Post Button -->
            <div class="mt-6">
                <a href="{{ route('post.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 w-full text-center block">
                    Añadir Post
                </a>
            </div>
        </div>
    </div>
</div>
