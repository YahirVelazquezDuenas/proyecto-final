<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Compra</title>
</head>
<body>
<section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h1 class="title">Registro de compras</h1>
                    <hr class="login-hr">
                    <p class="subtitle has-text-white">Ingresa los datos</p>
                    <div class="box">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif 
                        <form action="{{ url('/aceite') }}" method="POST"> 
                        @csrf
        <h3>Fecha</h3>
            <label for="fecha">Fecha de compra:</label>
            <input type="date" id="fecha" name="fecha" placeholder="" required>
        <br>
        <h3>Método</h3>
        <div>
            <input type="radio" id="efectivo" name="metodo" value="efectivo" checked>
            <label for="efectivo">Efectivo</label>
        </div>
        <div>
            <input type="radio" id="deposito" name="metodo" value="deposito">
            <label for="deposito">Depósito</label>
        </div>
        <div>
            <input type="radio" id="tarjeta" name="metodo" value="tarjeta">
            <label for="tarjeta">Tarjeta</label>
        </div>
        <br>
        <h3>Total</h3>
            <label for="total">Total a pagar: $</label>
            <input type="text" id="total" name="total" placeholder="1222.99" required pattern="^\d{1,8}(\.\d{1,2})?$">
        <br>
        <h3>Enviar</h3>
            <label for="enviar">Enviar:</label>
            <input type="submit" id="enviar" name="enviar">
    </form>
    <a href="{{ url('/compras') }}">Volver a encabezado de compras.</a>
</body>
</html>