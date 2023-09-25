<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal de compra</title>
</head>
<body>
    <h1>Encabezados de compras</h1>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h3>Comprar:</h3>
    <a href="{{ url('/compras/create') }}">Hacer una nueva compra.</a>
        <br>
    <form action="{{ url('/compras/showCompras') }}" method="GET"> 
        <h3>Buscar:</h3>
            <label for="id">ID de compra:</label>
            <input type="id" id="id" name="id" placeholder="12">
        <br>
        <label for="enviarse"></label>
        <input type="submit" id="enviar" name="enviar">
    </form>
    <h3>Compras registradas:</h3>
    @foreach ($comprasIndex as $compras)
        <ul>
            <li>{{ $compras->fecha }}
            <br>{{ $compras->metodo }}
            <br>{{ $compras->total }}</li>
        </ul>
    @endforeach
</body>
</html>