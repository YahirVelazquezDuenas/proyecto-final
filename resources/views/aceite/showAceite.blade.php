<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/elma.ico" />
    <link rel="stylesheet" href="{{ asset('css/aceite/showAceite.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/aceite/showAceite.css') }}">
    <title>Mostrar aceite</title>
</head>
<body>
<section class="hero is-success is-fullheight">
    <x-barra></x-barra>
        <div class="container">
            <h1 class="title" style="color: black;">Aceite encontrado</h1>
            <hr class="login-hr">
                <center>
                <table>
                    <tr>
                        <th colspan="2">Tabla del aceite: {{ $aceite->id }}</th>
                    </tr>
                    <tr>
                        <th>Atributo</th>
                        <th>Valor</th>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>{{ $aceite->id }}</td>
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
                        <td>Descripción</td>
                        <td>{{ $aceite->descripcion }}</td>
                    </tr>
                </table>
                <br><a href="{{ route('aceite.edit', $aceite->id) }}" class="button is-primary">Editar Aceite</a>
                <form action="{{ route('aceite.destroy', $aceite->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <br><button type="submit" class="button is-danger">Eliminar Aceite</button>
                </form>
                <br><a href="{{ url('/aceite') }}" class="button is-info">Volver a la lista de aceites</a>
            </center>
            <br><x-derechos></x-derechos>
        </div>
</section>
</body>
</html>