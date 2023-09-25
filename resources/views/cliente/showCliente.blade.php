<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente encontrado</title>
</head>
<body>
    <h1>Cliente encontrado</h1>
        <p><strong>ID del Cliente:</strong> {{ $cliente->id }}</p>
        <p><strong>Nombre del Cliente:</strong> {{ $cliente->nombre }}</p>
        <p><strong>Dirección del Cliente:</strong> {{ $cliente->direccion }}</p>
        <p><strong>Género del Cliente:</strong> {{ $cliente->genero }}</p>
        <p><strong>Télefono del Cliente:</strong> {{ $cliente->telefono }}</p>
        <p><strong>Correo del Cliente:</strong> {{ $cliente->correo }}</p>
        <p><strong>Contraseña del Cliente:</strong> {{ $cliente->contraseña }}</p>
        <p><strong>Comentario del Cliente:</strong> {{ $cliente->comentario }}</p>
    <a href="{{ url('/cliente') }}">Volver a la lista de compras</a>
</body>
</html>