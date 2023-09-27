<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal de compras</title>
</head>
<body>
    <h1>Lista de compras</h1>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ url('/') }}">Volver al inicio</a>
    <h3>Comprar:</h3>
    <a href="{{ url('/compras/create') }}">Hacer una nueva compra.</a>
        <br>
    <form action="{{ url('/compras/showCompras') }}" method="GET"> 
        <h3>Buscar:</h3>
            <label for="id">ID de compra:</label>
            <input type="id" id="id" name="id" placeholder="12">
        <br>
        <label for="enviar"></label>
        <input type="submit" id="enviar" name="enviar">
    </form>
    <h3>Compras registradas:</h3>
    @foreach ($comprasIndex as $compras)
        <ul>
            <li>ID: {{ $compras->id }}
            <br>Fecha: {{ $compras->fecha }}
            <br>Método: {{ $compras->metodo }}
            <br>Total: {{ $compras->total }}
            <br><a href="{{ route('compras.edit', $compras->id) }}">Editar Compra</a></li>
            <form action="{{ route('compras.destroy', $compras->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar Compra</button>
            </form>
        </ul>
    @endforeach
</body>
</html>