<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl font-semibold text-center mb-4">Regístrate</h2>
        <form action="#" method="POST" class="space-y-4">
            <input type="text" placeholder="Nombre de usuario" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="email" placeholder="Correo electrónico" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="password" placeholder="Contraseña" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600">Registrarse</button>
        </form>
        <p class="text-center text-gray-600 mt-4 text-sm">¿Ya tienes una cuenta? <a href="#" class="text-blue-500 hover:underline">Inicia sesión</a></p>
    </div>
</body>
</html>
