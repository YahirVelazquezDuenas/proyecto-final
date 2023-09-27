<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar compra</title>
    </head>
    <body>
        <h1>Editar compra</h1>
        <form action="{{ route('compras.update', $compras->id) }}" method="POST">
            @csrf
            @method('PUT')
        
            <label for="fecha">Fecha de compra:</label>
            <input type="date" id="fecha" name="fecha" value="{{ $compras->fecha }}"><br><br>
        
            <label for="metodo">Método de pago:</label>
            <input type="text" id="metodo" name="metodo" value="{{ $compras->metodo }}"><br><br>
        
            <label for="total">Total a pagar:</label>
            <input type="text" id="total" name="total" value="{{ $compras->total }}"><br><br>
        
            <button type="submit">Guardar cambios</button><br><br>
        </form>
        <form action="{{ route('compras.destroy', $compras->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar Compra</button>
        </form>
        <a href="{{ url('/compras') }}">Volver a la lista de compras</a>
    </body>
</html>