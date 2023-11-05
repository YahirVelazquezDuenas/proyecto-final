<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/hinataico.ico" />
    <link rel="stylesheet" href="{{ asset('css/compras/editCompras.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/compras/editCompras.css') }}">
    <title>Editar compra</title>
</head>
<body>
<section class="hero is-success is-fullheight">
    <x-barra></x-barra> 
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
                <h1 class="title">Editar Compra</h1>
                <hr class="login-hr">
                <p class="subtitle has-text-white">Ingresa los nuevos datos</p>
                <div class="box">
                    <form action="{{ route('compras.update', $compras->id_compra) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-validation-errors :errors="$errors" class="mb-4" />
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="field">
                            <label class="label" for="fecha">Fecha de compra:</label>
                            <div class="control">
                                <input class="input" type="date" id="fecha" name="fecha" value="{{ $compras->fecha }}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Método de pago:</label>
                            <div class="control">
                                <label class="radio">
                                    <input type="radio" name="metodo" value="efectivo" {{ $compras->metodo === 'efectivo' ? 'checked' : '' }}>
                                    Efectivo
                                </label>
                                <label class="radio">
                                    <input type="radio" name="metodo" value="deposito" {{ $compras->metodo === 'deposito' ? 'checked' : '' }}>
                                    Depósito
                                </label>
                                <label class="radio">
                                    <input type="radio" name="metodo" value="tarjeta" {{ $compras->metodo === 'tarjeta' ? 'checked' : '' }}>
                                    Tarjeta
                                </label>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Cliente:</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="id_cliente">
                                        @foreach($clientes as $cliente)
                                            <option value="{{ $cliente->id_cliente }}" {{ $compras->cliente->id_cliente == $cliente->id_cliente ? 'selected' : '' }}>
                                                {{ $cliente->nombre }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="field">
                            <label class="label">Detalles de la compra:</label>
                            <div class="control">
                                @foreach ($compras->detallesCompras as $detalle)
                                    <div class="detalle-item">
                                        <div class="select">
                                            <select name="aceites[]">
                                                @foreach($aceites as $aceite)
                                                    <option value="{{ $aceite->id_aceite }}" {{ $detalle->id_aceite == $aceite->id_aceite ? 'selected' : '' }}>{{ $aceite->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="field">
                                            <div class="control">
                                                <input class="input" type="number" name="cantidad[]" placeholder="Cantidad" value="{{ $detalle->cantidad }}">
                                            </div><br>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-block is-info is-large is-fullwidth" type="submit">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('compras.destroy', $compras->id_compra) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="field">
                            <div class="control">
                                <button class="button is-block is-danger is-large is-fullwidth" type="submit">Eliminar Compra</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <p class="has-text-purple">
                        <a href="/compras">Regresar</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <x-derechos></x-derechos>
</section>
</body>
</html>
