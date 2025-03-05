<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl font-semibold text-center mb-4">Iniciar Sesión</h2>
        <form action="{{ route('user.showLogin') }}" method="POST" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Correo electrónico" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            <input type="password" name="password" placeholder="Contraseña" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            <button type="submit" class="w-full bg-fuchsia-500 text-white p-3 rounded-lg hover:bg-fuchsia-700">Iniciar Sesión</button>
        </form>
        <p class="text-center text-gray-600 mt-4 text-sm">¿No tienes una cuenta? <a href="{{route('user.showRegister')}}" class="text-fuchsia-500 hover:underline">Regístrate</a></p>
    </div>
</body>
</html>
