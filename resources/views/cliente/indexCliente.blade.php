<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal de cliente</title>
</head>
<body>
    <h1>Hola soy un cliente</h1>

    @foreach ($clienteIndex as $cliente)
        <ul>
            <li>{{ $cliente->nombre }}
            <br>{{ $cliente->direccion }}
            <br>{{ $cliente->genero }}
            <br>{{ $cliente->telefono }}
            <br>{{ $cliente->correo }}
            <br>{{ $cliente->contraseña }}
            <br>{{ $cliente->correo }}</li>
        </ul>
    @endforeach  
</body>
</html>