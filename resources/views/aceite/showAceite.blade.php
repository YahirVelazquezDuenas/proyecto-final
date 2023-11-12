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
                        <td>Precio</td>
                        <td>{{ $aceite->precio }}</td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td>{{ $aceite->descripcion }}</td>
                    </tr>
                    @if ($aceite->archivo_nombre && $aceite->archivo_ubicacion && Storage::exists($aceite->archivo_ubicacion))
                    <tr>
                        <td>Archivo</td>                    
                        <td><a href="{{ route('aceite.descarga', $aceite)}}">{{ $aceite->archivo_nombre}}</a></td>
                    </tr>
                    <tr>
                        <td>Imagen</td>
                        <td><img src="{{ \Storage::url($aceite->archivo_ubicacion)}}" alt="Esta es una imagen"></td>
                    </tr>
                    @endif 
                </table>
                <br><a href="{{ route('aceite.edit', $aceite->id_aceite) }}" class="button is-primary">Editar Aceite</a>
                <form action="{{ route('aceite.destroy', $aceite->id_aceite) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <br><button type="submit" class="button is-danger">Eliminar Aceite</button>
                </form><br>
                <form action="{{ route('aceite.eliminar-archivo', $aceite->id_aceite) }}" method="POST">
                @csrf
                @method('DELETE')
                    <button type="submit" class="button is-warning">Eliminar Archivo</button>
                </form>
                <br><a href="{{ url('/aceite') }}" class="button is-info">Volver a la lista de aceites</a>
            </center>
            <br><x-derechos></x-derechos>
        </div>
</section>
</body>
</html>