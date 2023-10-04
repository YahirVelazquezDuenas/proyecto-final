<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/indexCliente.css') }}">
    <title>Principal de cliente</title>
</head>
<body>
    <center><h1>Encabezados de cliente</h1></center>
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
            <table>
                <tr>
                    <th>Atributo</th>
                    <th>Valor</th>
                </tr>
                <tr>
                    <td>ID:</td>
                    <td>{{ $cliente->id }}</td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td>{{ $cliente->nombre }}</td>
                </tr>
                <tr>
                    <td>Dirección:</td>
                    <td>{{ $cliente->direccion }}</td>
                </tr>
                <tr>
                    <td>Usuario:</td>
                    <td>{{ $cliente->usuario }}</td>
                </tr>
                <tr>
                    <td>Teléfono:</td>
                    <td>{{ $cliente->telefono }}</td>
                </tr>
                <tr>
                    <td>Correo:</td>
                    <td>{{ $cliente->correo }}</td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td>{{ $cliente->contraseña }}</td>
                </tr>
                <tr>
                    <td>Comentario:</td>
                    <td>{{ $cliente->comentario }}</td>
                </tr>
            </table>
            <br><a href="{{ route('cliente.edit', $cliente->id) }}">Editar Cliente</a>
            <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar Cliente</button>
            </form></li>
        </ul>
    @endforeach
</body>
</html>