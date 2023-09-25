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
        <h3>Genero</h3>
            <label for="genero">Genero:</label>
        <br>
            <label for="masculino">
            <input type="radio" id="masculino" name="genero" value="masculino">Masculino</label>
        <br>
            <label for="femenino">
            <input type="radio" id="femenino" name="genero" value="femenino">Femenino</label>
        <br>    
            <label for="especifique">Especifique:</label>
            <input type="text" id="especifique" name="especifique" placeholder="Especifique su género">
        <br>
        <h3>Teléfono</h3>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" placeholder="Telefono" required pattern=".{10,}"><em><strong>No se permiten menos de diez digitos</strong></em>>
        <br>
        <h3>Correo</h3>
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" placeholder="correo@ejemplo.com" required>
        <br>
        <h3>Contraseña</h3>
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required pattern=".{6,}"><em><strong>No se permiten menos de seis caracteres</strong></em>
        <br>
        <h3>Comentario</h3>
            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" placeholder="Deje su comentario por favor" 
            rows="3" cols="40"></textarea>
        <br> 
        <h3>Enviar</h3>
            <label for="enviar">Enviar:</label>
            <input type="submit" id="enviar" name="enviar">
        </form>
        <a href="{{ url('/cliente') }}">Volver a encabezado de clientes.</a>
</body>
</html>