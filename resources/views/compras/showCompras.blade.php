<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/kanao.ico" />
    <link rel="stylesheet" href="{{ asset('css/compras/showcompras.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/compras/showcompras.css') }}">
    <title>Mostrar compra</title>
</head>
<body>
<section class="hero is-success is-fullheight">
    <x-barras></x-barras>
        <div class="container">
            <h1 class="title">Compra encontrada</h1>
            <hr class="login-hr">
            <center>
                <table>
                    <tr>
                        <th colspan="2">Tabla de la compra: {{ $compra->id_compra }}</th>
                    </tr>
                    <tr>
                        <th>Atributo</th>
                        <th>Valor</th>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>{{ $compra->id_compra }}</td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td>{{ $compra->fecha }}</td>
                    </tr>
                    <tr>
                        <td>Método</td>
                        <td>{{ $compra->metodo }}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>{{ $compra->total }}</td>
                    </tr>
                    <tr>
                            <td>ID del Cliente</td>
                            <td>{{ $compra->cliente->id_cliente }}</td>
                        </tr>
                        <tr>
                            <td>Nombre del Cliente</td>
                            <td>{{ $compra->cliente->nombre }}</td>
                        </tr>
                </table> 
                <table>
                        <tr>
                            <th>ID_detalle</th>
                            <th>ID_aceite</th>
                            <th>Aceite</th>
                            <th>Cantidad</th>
                        </tr>
                        @foreach ($compra->detallesCompras as $detalle)
                            <tr>
                                <td>{{ $detalle->id_detalle }}</td>
                                <td>{{ $detalle->aceite->id_aceite }}</td>
                                <td>{{ $detalle->aceite->nombre }}</td>
                                <td>{{ $detalle->cantidad }}</td>
                            </tr>
                        @endforeach
                    </table>   
                <br><a href="{{ route('compras.edit', $compra->id_compra) }}" class="button is-primary">Editar Compra</a>
                <form action="{{ route('compras.destroy', $compra->id_compra) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <br><button type="submit" class="button is-danger">Eliminar Compra</button>
                </form>
                <br><a href="{{ url('/compras') }}" class="button is-info">Volver a la lista de compras</a>
            </center>
            <br><x-derechos></x-derechos>
        </div>
</section>
</body>
</html>