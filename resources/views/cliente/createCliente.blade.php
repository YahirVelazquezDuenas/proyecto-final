<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
</head>
<body>
    <h1>Registro de cliente</h1>
    <form action="{{ url('/cliente') }}" method="POST"> 
        @csrf
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3>Nombre</h3>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre">
        <br>
        <h3>Dirección</h3>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" placeholder="Direccion">
        <br>
        <h3>Género</h3>
            <label for="genero">Género:</label>
            <input type="text" id="genero" name="genero" placeholder="Genero">
        <br>
        <h3>Teléfono</h3>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" placeholder="Telefono">
        <br>
        <h3>Correo</h3>
            <label for="correo">Correo:</label>
            <input type="text" id="correo" name="correo" placeholder="Correo">
        <br>
        <h3>Contraseña</h3>
            <label for="contraseña">Contraseña:</label>
            <input type="text" id="contraseña" name="contraseña" placeholder="Contraseña">
        <br>
        <h3>Comentario</h3>
            <label for="comentario">Comentario:</label>
            <input type="text" id="comentario" name="comentario" placeholder="Comentario">
        <br> 
        <h3>Enviar</h3>
            <label for="enviar">Enviar:</label>
            <input type="submit" id="enviar" name="enviar">
</body>
</html>