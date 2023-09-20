<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Compra</title>
</head>
<body>
    <h1>Registro de compras</h1>
    <form action="{{ url('/compras') }}" method="POST"> 
        @csrf
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3>Fecha</h3>
            <label for="fecha">Fecha de compra:</label>
            <input type="date" id="fecha" name="fecha" placeholder="">
        <br>
        <h3>Método</h3>
            <label for="metodo">Método de pago:</label>
            <input type="text" id="metodo" name="metodo" placeholder="Método">
        <br>
        <h3>Total</h3>
            <label for="total">Total a pagar:</label>
            <input type="text" id="total" name="total" placeholder="total">
        <br>
        <h3>Enviar</h3>
            <label for="enviar">Enviar:</label>
            <input type="submit" id="enviar" name="enviar">
</body>
</html>