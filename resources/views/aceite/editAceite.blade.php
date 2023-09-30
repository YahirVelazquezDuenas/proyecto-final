<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar aceites</title>
    </head>
    <body>
        <h1>Editar aceites</h1>
        <form action="{{ route('aceite.update', $aceite->id) }}" method="POST">
            @csrf
            @method('PUT')
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h3>Nombre</h3>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Diesel LSD" value={{$aceite->nombre}} required pattern="^.{1,49}$">
            <br>
            <h3>Tipo</h3>
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" placeholder="Diesel" value={{$aceite->tipo}} pattern="^.{0,49}$">
            <br>
            <h3>Cantidad</h3>
                <label for="cantidad">Cantidad:</label>
                <input type="text" id="cantidad" name="cantidad" placeholder="5200" value={{$aceite->cantidad}} pattern="^.{0,49}$">
            <br>
            <h3>Marca</h3>
                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" placeholder="ACME" value={{$aceite->marca}} pattern="^.{0,49}$">
            <br>
            <h3>Descripcion</h3>
                <label for="descripcion">Descripcion:</label>
            <br>
                <textarea id="descripcion" name="descripcion" 
                rows="3" cols="40" placeholder="Producto para maquinaria pesada." pattern="^.{0,254}$">{{$aceite->descripcion}}</textarea>
            <br> 
            <button type="submit">Guardar cambios</button><br><br>
        </form>
        <a href="{{ url('/aceite') }}">Volver a encabezado de aceite.</a>            
        <form action="{{ route('aceite.destroy', $aceite->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar Aceite</button>
        </form>
        <a href="{{ url('/aceit') }}">Volver a la lista de aceites</a>
    </body>
</html>