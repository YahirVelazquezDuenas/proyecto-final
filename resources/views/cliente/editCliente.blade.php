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
        
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value={{$cliente->nombre}}>
            <br>
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value={{$cliente->direccion}}>
            <br>
                <label for="genero">Genero:</label>
            <br>
                <label for="masculino">
                <input type="radio" id="masculino" name="genero" value="masculino">Masculino</label>
            <br>
                <label for="femenino">
                <input type="radio" id="femenino" name="genero" value="femenino">Femenino</label>
            <br>    
                <label for="especifique">Especifique:</label>
                <input type="text" id="especifique" name="especifique" value={{$cliente->genero}}>
            <br>
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value={{$cliente->telefono}} required pattern=".{10,}"><em><strong>No se permiten menos de diez digitos</strong></em>
            <br>
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" value={{$cliente->correo}} required>
            <br>
                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" value={{$cliente->contraseña}} required pattern=".{6,}"><em><strong>No se permiten menos de seis caracteres</strong></em>
            <br>
                <label for="comentario">Comentario:</label>
                <textarea id="comentario" name="comentario" value={{$cliente->comentario}} 
                rows="3" cols="40"></textarea>
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