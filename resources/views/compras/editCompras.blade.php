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
            <x-validation-errors :errors="$errors" class="mb-4" />
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <label for="fecha">Fecha de compra:</label>
            <input type="date" id="fecha" name="fecha" value="{{ $compras->fecha }}"><br><br>
        
            <h3>Método</h3>
            <div>
                <input type="radio" id="efectivo" name="metodo" value="efectivo" {{ $compras->metodo === 'efectivo' ? 'checked' : '' }}>
                <label for="efectivo">Efectivo</label>
            </div>
            <div>
                <input type="radio" id="deposito" name="metodo" value="deposito" {{ $compras->metodo === 'deposito' ? 'checked' : '' }}>
                <label for="deposito">Depósito</label>
            </div>
            <div>
                <input type="radio" id="tarjeta" name="metodo" value="tarjeta" {{ $compras->metodo === 'tarjeta' ? 'checked' : '' }}>
                <label for="tarjeta">Tarjeta</label>
            </div>

            <label for="total">Total a pagar: $</label>
            <input type="text" id="total" name="total" placeholder="1222.99" value="{{ $compras->total}}"><br><br>
        
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