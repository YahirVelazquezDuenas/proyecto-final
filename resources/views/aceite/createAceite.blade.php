<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Aceite</title>
</head>
<body>
    <h1>Registro de aceites</h1>
    <form action="{{ url('/aceite') }}" method="POST"> 
        @csrf
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3>Nombre</h3>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre">
        <br>
        <h3>Tipo</h3>
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" placeholder="Tipo">
        <br>
        <h3>Cantidad</h3>
            <label for="cantidad">Cantidad:</label>
            <input type="text" id="cantidad" name="cantidad" placeholder="$">
        <br>
        <h3>Marca</h3>
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" placeholder="Marca">
        <br>
        <h3>Descripcion</h3>
            <label for="descripcion">Descripcion:</label>
        <br>
            <textarea id="descripcion" name="descripcion" placeholder="Deje su opinión por favor" 
            rows="3" cols="40"></textarea>
        <br>
        <h3>Enviar</h3>
            <label for="enviar">Enviar:</label>
            <input type="submit" id="enviar" name="enviar">
</body>
</html>