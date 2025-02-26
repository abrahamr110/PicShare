<div class="bg-white shadow-md p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo de Instagram (puedes cambiarlo con tu logo) -->
        <a href="/" class="flex items-center space-x-2 text-2xl font-semibold text-blue-600">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/1024px-Instagram_icon.png" alt="Logo" class="h-8 w-8">
            <span class="text-gray-600">PicShare</span>
        </a>

        <!-- Barra de búsqueda y opciones de navegación (en pantallas grandes) -->
        <div class="hidden md:flex space-x-8 items-center">
            <div class="relative">
                <input type="text" placeholder="Buscar" class="border border-gray-300 p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                
            </div>
    
            <a href="{{route('user.showProfile')}}" class="text-sm text-gray-600 hover:text-blue-600 transition">Perfil</a>
            
            <!-- Menú de Cerrar sesión si el usuario está logueado -->
            @auth
                <a href="{{ route('user.doLogout') }}"  class="text-sm text-gray-600 hover:text-red-600 transition">Cerrar sesión</a>
            @endauth
            @guest
                <a href="{{ route('user.doLogin') }}" class="text-sm text-gray-600 hover:text-blue-600 transition">Iniciar sesión</a>
                <a href="{{ route('user.doRegister') }}" class="text-sm text-gray-600 hover:text-blue-600 transition">Registrarse</a>
            @endguest
        </div>

        <!-- Íconos de usuario y opciones (en dispositivos pequeños) -->
        <div class="md:hidden flex items-center space-x-4">
            @auth
                <form action="{{ route('user.doLogout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-gray-600 hover:text-red-600 transition">Cerrar sesión</button>
                </form>
            @endauth
            @guest
                <a href="{{ route('user.doLogin') }}" class="text-sm text-gray-600 hover:text-blue-600 transition">Iniciar sesión</a>
                <a href="{{ route('user.doRegister') }}" class="text-sm text-gray-600 hover:text-blue-600 transition">Registrarse</a>
            @endguest

            <!-- Íconos de usuario y menú en dispositivos móviles -->
            <button class="text-gray-600 hover:text-blue-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</div>
