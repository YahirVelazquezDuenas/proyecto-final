<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal de cliente</title>
</head>
<body>
    <center><h1>Encabezados de cliente</h1></center>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h3>Cliente:</h3>
    <a href="{{ url('/cliente/create') }}">Registrar un nuevo cliente.</a>
        <br>
    <form action="{{ url('/cliente/showCliente') }}" method="GET"> 
        <h3>Buscar:</h3>
            <label for="id">ID de cliente:</label>
            <input type="id" id="id" name="id" placeholder="12">
        <br>
        <label for="enviar"></label>
        <input type="submit" id="enviar" name="enviar">
    </form>
    <h3>Clientes registrados:</h3>
    @foreach ($clienteIndex as $cliente)
        <ul>
            <li>ID: {{ $cliente->id }}
            <br>Nombre: {{ $cliente->nombre }}
            <br>Dirección: {{ $cliente->direccion }}
            <br>Género: {{ $cliente->genero }}
            <br>Teléfono: {{ $cliente->telefono }}
            <br>Correo: {{ $cliente->correo }}
            <br>Contraseña: {{ $cliente->contraseña }}
            <br>Comentario: {{ $cliente->comentario }}</li>
        </ul>
    @endforeach
</body>
</html>