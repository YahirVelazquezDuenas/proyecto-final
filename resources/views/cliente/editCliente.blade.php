<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar cliente</title>
    </head>
    <body>
        <h1>Editar cliente</h1>
        <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-validation-errors :errors="$errors" class="mb-4" />
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value={{$cliente->nombre}} placeholder="Pedro Castro Salcedo">
            <br>
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value={{$cliente->direccion}} placeholder="Av. Pachin 9873 int. 22. Col. Pachines de Salcedo. Guadalajara, Jalisco." >
            <br>
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value={{$cliente->telefono}} placeholder="+52 33 1248 9772"><em><strong>No se permiten menos de diez digitos</strong></em>
            <br>
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" value={{$cliente->correo}} placeholder="pedro@hotmail.com">
            <br>
                <label for="comentario">Comentario:</label>
                <textarea id="comentario" name="comentario"
                rows="3" cols="40" placeholder="Favor de traer trompa de cochino para pasar el full.">{{$cliente->comentario}}</textarea>
            <br> 
            <button type="submit">Guardar cambios</button><br><br>
        </form>
        <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar Cliente</button>
        </form>
        <a href="{{ url('/cliente') }}">Volver a la lista de clientes</a>
    </body>
</html>