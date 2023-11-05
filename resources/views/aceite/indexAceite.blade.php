<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/yourico.ico" />
    <link rel="stylesheet" href="{{ asset('css/aceite/indexAceite.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/aceite/indexAceite.css') }}">
    <title>Principal de aceites</title>
</head>
<body>
<section class="hero is-success is-fullheight">
    <x-barra></x-barra> 
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
        <div class="container">
            <h1 class="title" style="color: black;">Principal de Aceites</h1>
                <br><a href="{{ url('/aceite/create') }}" class="button is-block is-info">
                Registrar un nuevo aceite
                </a><br><br>
            <form action="{{ url('/aceite/showAceite') }}" method="GET"> 
            <div class="sub">
                <label for="id">ID de aceite a buscar:</label>
                <input class="cuadro-buscar" type="id" id="id" name="id_aceite" placeholder="12" autofocus="">
            </div><br><br>
            <label for="enviar"></label>
            <input type="submit" class="button is-block is-info is-large is-fullwidth" id="enviar" name="enviar">
            </form>
            <br><h2 class="title" style="color: black;">Tablas de aceites registrados</h2>
                @foreach ($aceiteIndex as $aceite)
                    <ul>
                        <center>
                        <table>
                            <tr>
                                <th colspan="2">Tabla del aceite: {{ $aceite->id_aceite }}</th>
                            </tr>
                            <tr>
                                <th>Atributo</th>
                                <th>Valor</th>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td>{{ $aceite->id_aceite }}</td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td>{{ $aceite->nombre }}</td>
                            </tr>
                            <tr>
                                <td>Tipo</td>
                                <td>{{ $aceite->tipo }}</td>
                            </tr>
                            <tr>
                                <td>Cantidad</td>
                                <td>{{ $aceite->cantidad }}</td>
                            </tr>
                            <tr>
                                <td>Marca</td>
                                <td>{{ $aceite->marca }}</td>
                            </tr>
                            <tr>
                                <td>Descripcion</td>
                                <td>{{ $aceite->descripcion }}</td>
                            </tr>
                            <tr>
                                <td>Precio</td>
                                <td>{{ $aceite->precio }}</td>
                            </tr>
                        </table>
                        <br><a href="{{ route('aceite.edit', $aceite->id_aceite) }}" class="button is-primary">Editar Aceite</a>
                        <form action="{{ route('aceite.destroy', $aceite->id_aceite) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <br><button type="submit" class="button is-danger">Eliminar Aceite</button>
                        </form><br>
                    </ul>
                @endforeach 
                        </center>
        </div>
    <x-derechos></x-derechos>
</section>
</body>
</html>