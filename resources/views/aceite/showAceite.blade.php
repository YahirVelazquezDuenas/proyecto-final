<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aceite encontrado</title>
</head>
<body>
    <h1>Aceite encontrado</h1>
        <p><strong>ID de Aceite:</strong> {{ $aceite->id }}</p>
        <p><strong>Nombre de Aceite:</strong> {{ $aceite->nombre }}</p>
        <p><strong>Tipo de Aceite:</strong> {{ $aceite->tipo }}</p>
        <p><strong>Cantidad de Aceite:</strong> {{ $aceite->cantidad }}</p>
        <p><strong>Marca de Aceite:</strong> {{ $aceite->marca }}</p>
        <p><strong>Descripción de Aceite:</strong> {{ $aceite->descripcion }}</p>
        <a href="{{ route('aceite.edit', $aceite->id) }}">Editar Aceite</a>
            <form action="{{ route('aceite.destroy', $aceite->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar Aceite</button>
        <br><a href="{{ url('/aceite') }}">Volver a la lista de aceites</a>
</body>
</html>