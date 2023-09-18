<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Aceite</title>
</head>
<body>
    <h1>Formulario de Aceite</h1>
    <form action="aceite" method="POST"> 
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
            <input type="text" id="cantidad" name="cantidad" placeholder="Cantidad">
        <br>
        <h3>Marca</h3>
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" placeholder="Marca">
        <br>
        <h3>Descripcion</h3>
            <label for="descripcion">Descripcion:</label>
        <br>
            <textarea id="descripcion" name="descripcion" placeholder="Descripcion" rows="3" cols="40"></textarea>
        <br>
        <h3>Enviar</h3>
            <label for="enviar">Enviar:</label>
            <input type="submit" id="enviar" name="enviar">
</body>
</html>