<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal de aceite</title>
</head>
<body>
    <center><h1>Encabezado de aceite</h1></center>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <a href="{{ url('/') }}">Volver al inicio</a>
    <h3>Aceite:</h3>
    <a href="{{ url('/aceite/create') }}">Registrar un nuevo aceite.</a>
        <br>
    <form action="{{ url('/aceite/showAceite') }}" method="GET"> 
        <h3>Buscar:</h3>
            <label for="id">ID de aceite:</label>
            <input type="id" id="id" name="id" placeholder="12">
        <br>
        <label for="enviar"></label>
        <input type="submit" id="enviar" name="enviar">
    </form>
    <h3>Aceites registrados:</h3>
    @foreach ($aceiteIndex as $aceite)
        <ul>
            <li>ID: {{ $aceite->id }}
            <br>Nombre: {{ $aceite->nombre }}
            <br>Tipo: {{ $aceite->tipo }}
            <br>Cantidad: {{ $aceite->cantidad }}
            <br>Marca: {{ $aceite->marca }}
            <br>Descripción: {{ $aceite->descripcion }}</li>
        </ul>
    @endforeach
</body>
</html>