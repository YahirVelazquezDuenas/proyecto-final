<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inicio</title>
    </head>
    <body>
        <h1>Inicio</h1>
        <ul>
            <li><a href="{{ route('aceite.index') }}">Aceite</a></li>
            <li><a href="{{ route('cliente.index') }}">Cliente</a></li>
            <li><a href="{{ route('compras.index') }}">Compras</a></li>
        </ul>
    </body>
</html>
