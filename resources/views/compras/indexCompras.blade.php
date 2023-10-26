<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/evangelionico.ico" />
    <link rel="stylesheet" href="{{ asset('css/compras/indexCompras.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/compras/indexCompras.css') }}">
    <title>Principal de compras</title>
</head>
<body>
<section class="hero is-success is-fullheight">
    <x-barras></x-barras> 
        @if(session('errorc'))
            <div class="alert alert-danger">
                {{ session('errorc') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <h1 class="title" style="color: white;">Principal de Compras</h1>
            <br><a href="{{ url('/compras/create') }}" class="button is-info is-fullwidth">
                Registrar una nueva compra
            </a><br><br>
            <form action="{{ url('/compras/showCompras') }}" method="GET"> 
                <div class="sub">
                    <label for="id">ID de compra a buscar:</label>
                    <input class="cuadro-buscar" type="id" id="id" name="id_compra" placeholder="21" autofocus="">
                </div><br><br>
                    <label for="enviar"></label>
                    <input type="submit" class="button is-block is-info is-large is-fullwidth" id="enviar" name="enviar">
            </form>
            <br><h2 class="title" style="color: white;">Tablas de compras registradas</h2>
            @foreach ($comprasIndex as $compras)
            @foreach ($compra->detallesCompras as $detalle)
            {{ $detalle->aceite-> }
            @foreach ($detalleIndex as $detalle)
                <ul> 
                    <center>
                    <table>
                        <tr>
                            <th colspan="2">Tabla de la compra: {{ $compras->id_compra }}</th>
                        </tr>
                        <tr>
                            <th>Atributo</th>
                            <th>Valor</th>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>{{ $compras->id_compra }}</td>
                        </tr>
                        <tr>
                            <td>Fecha</td>

                            <td>{{ $compras->fecha }}</td>
                        </tr>
                        <tr>
                            <td>Método</td>
                            <td>{{ $compras->metodo }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>{{ $compras->total }}</td>
                        </tr>
                        <tr>
                            <td>ID_detalle</td>
                            <td>{{ $detalle->id_detalle }}</td>
                        </tr>
                        <tr>
                            <td>ID_aceite</td>
                            <td>{{ $detalle->id_aceite }}</td>
                        </tr>
                        <tr>
                            <td>Cantidad</td>
                            <td>{{ $detalle->cantidad }}</td>
                        </tr>
                    </table>
                    <br><a href="{{ route('compras.edit', $compras->id_compra) }}" class="button is-primary">Editar Compra</a>
                    <form action="{{ route('compras.destroy', $compras->id_compra) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <br><button type="submit" class="button is-danger">Eliminar Compra</button>
                    </form><br>@endforeach
                </ul>
                
            @endforeach
                    </center>
        </div>
    <x-derechos></x-derechos>
</section>
</body>
</html>