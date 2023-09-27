<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar aceites</title>
    </head>
    <body>
        <h1>Editar aceite</h1>
        <form action="{{ route('aceite.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')
        
            <h3>Nombre</h3>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value={{$aceite->nombre}}>
            <br>
            <h3>Tipo</h3>
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" value={{$aceite->tipo}}>
            <br>
            <h3>Cantidad</h3>
                <label for="cantidad">Cantidad:</label>
                <input type="text" id="cantidad" name="cantidad" value={{$aceite->cantidad}}>
            <br>
            <h3>Marca</h3>
                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" value={{$aceite->marca}}>
            <br>
            <h3>Descripcion</h3>
                <label for="descripcion">Descripcion:</label>
            <br>
                <textarea id="descripcion" name="descripcion" value={{$aceite->comentario}} 
                rows="3" cols="40"></textarea>
            <br> 
            <button type="submit">Guardar cambios</button><br><br>
        </form>
        <a href="{{ url('/aceite') }}">Volver a encabezado de aceite.</a>            
        <form action="{{ route('aceite.destroy', $cliente->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar Aceite</button>
        </form>
        <a href="{{ url('/aceit') }}">Volver a la lista de aceites</a>
    </body>
</html>