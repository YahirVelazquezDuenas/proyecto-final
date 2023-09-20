<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal de aceite</title>
</head>
<body>
    <h1>Encabezados de aceites</h1>
    @foreach ($aceiteIndex as $aceite)
        <ul>
            <li>{{ $aceite->nombre }}
            <br>{{ $aceite->tipo }}
            <br>{{ $aceite->cantidad }}
            <br>{{ $aceite->marca }}
            <br>{{ $aceite->descripcion }}</li>
        </ul>        
    @endforeach
</body>
</html>