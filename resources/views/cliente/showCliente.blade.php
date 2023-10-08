<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/showCliente.css') }}">
    <title>Cliente encontrado</title>
</head>
<body>
    <h1>Cliente encontrado</h1>
    <table>
    <tr>
        <th>ID del Cliente</th>
        <td>{{ $cliente->id }}</td>
    </tr>
    <tr>
        <th>Nombre del Cliente</th>
        <td>{{ $cliente->nombre }}</td>
    </tr>
    <tr>
        <th>Dirección del Cliente</th>
        <td>{{ $cliente->direccion }}</td>
    </tr>
    <tr>
        <th>Teléfono del Cliente</th>
        <td>{{ $cliente->telefono }}</td>
    </tr>
    <tr>
        <th>Correo del Cliente</th>
        <td>{{ $cliente->correo }}</td>
    </tr>
    <tr>
        <th>Comentario del Cliente</th>
        <td>{{ $cliente->comentario }}</td>
    </tr>
</table>
        <a href="{{ route('cliente.edit', $cliente->id) }}">Editar Cliente</a></li>
            <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar Cliente</button>
            </form>
    <a href="{{ url('/cliente') }}">Volver a la lista de clientes</a>
</body>
</html>