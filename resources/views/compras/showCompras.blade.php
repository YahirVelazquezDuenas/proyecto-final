<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra encontrada</title>
</head>
<body>
    <h1>Compra encontrada</h1>
        <p><strong>ID de Compra:</strong> {{ $compra->id }}</p>
        <p><strong>Fecha de Compra:</strong> {{ $compra->fecha }}</p>
        <p><strong>Método de Pago:</strong> {{ $compra->metodo }}</p>
        <p><strong>Total a Pagar:</strong> {{ $compra->total }}</p>
    <a href="{{ url('/compras') }}">Volver a la lista de compras</a>
</body>
</html>