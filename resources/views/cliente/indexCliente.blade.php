<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/cmico.ico" />
    <link rel="stylesheet" href="{{ asset('css/cliente/indexCliente.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cliente/indexCliente.css') }}">
    <title>Principal de clientes</title>
</head>
<body>
<section class="hero is-success is-fullheight">
    <x-barra></x-barra> 
    
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <h1 class="title" style="color: black;">Principal de Clientes</h1>
            <br><a href="{{ url('/cliente/create') }}" class="button is-info is-fullwidth">
                Registrar un nuevo cliente
            </a><br><br>
            <form action="{{ url('/cliente/showCliente') }}" method="GET"> 
                <div class="sub">
                    <label for="id">ID de cliente a buscar:</label>
                    <input class="cuadro-buscar" type="id" id="id" name="id_cliente" placeholder="21" autofocus="">
                </div><br><br>
                <label for="enviar"></label>
                <input type="submit" class="button is-block is-info is-large is-fullwidth" id="enviar" name="enviar">
            </form>
            @if ($clienteIndex->isNotEmpty())
            <br><h2 class="title" style="color: black;">Tablas de clientes registrados</h2>
            @foreach ($clienteIndex as $cliente)
                <ul>
                    <center>
                    <table>
                        <tr>
                            <th colspan="2">Tabla del cliente: {{ $cliente->id_cliente }}</th>
                        </tr>
                        <tr>
                            <th>Atributo</th>
                            <th>Valor</th>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>{{ $cliente->id_cliente }}</td>
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
                    <br><a href="{{ route('cliente.edit', $cliente->id_cliente) }}" class="button is-primary">Editar Cliente</a>
                    <form action="{{ route('cliente.destroy', $cliente->id_cliente) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <br><button type="submit" class="button is-danger">Eliminar Cliente</button>
                    </form><br>
                </ul>
            @endforeach
            @endif
                    </center>
        </div>
    <x-derechos></x-derechos>
</section>
</body>
</html>