<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/kakashiico.ico" />
    <link rel="stylesheet" href="{{ asset('css/cliente/showCliente.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cliente/showCliente.css') }}">
    <title>Mostrar cliente</title>
</head>
<body>
<section class="hero is-success is-fullheight">
    <x-barra></x-barra>
        <div class="container">
            <h1 class="title" style="color: black;">Cliente encontrado</h1>
            <hr class="login-hr">
                <center>
                <table>
                    <tr>
                        <th colspan="2">Tabla del cliente: {{ $cliente->id }}</th>
                    </tr>
                    <tr>
                        <th>Atributo</th>
                        <th>Valor</th>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>{{ $cliente->id }}</td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td>{{ $cliente->nombre }}</td>
                    </tr>
                    <tr>
                        <td>Dirección</td>
                        <td>{{ $cliente->direccion }}</td>
                    </tr>
                    <tr>
                        <td>Teléfono</td>
                        <td>{{ $cliente->telefono }}</td>
                    </tr>
                    <tr>
                        <td>Correo</td>
                        <td>{{ $cliente->correo }}</td>
                    </tr>
                    <tr>
                        <td>Comentario</td>
                        <td>{{ $cliente->comentario }}</td>
                    </tr>
                </table>
                <br><a href="{{ route('cliente.edit', $cliente->id) }}" class="button is-primary">Editar Cliente</a>
                <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <br><button type="submit" class="button is-danger">Eliminar Cliente</button>
                </form>
                <br><a href="{{ url('/cliente') }}" class="button is-info">Volver a la lista de clientes</a>
            </center>
            <br><x-derechos></x-derechos>
        </div>
</section>
</body>
</html>