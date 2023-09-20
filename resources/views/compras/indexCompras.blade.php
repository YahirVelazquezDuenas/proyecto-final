<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal de compra</title>
</head>
<body>
    <h1>Encabezados de compras</h1>
    @foreach ($comprasIndex as $compras)
        <ul>
            <li>{{ $compras->fecha }}
            <br>{{ $compras->metodo }}
            <br>{{ $compras->total }}</li>
        </ul>
    @endforeach
</body>
</html>