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
                        <form action="{{ route('compras.update', $compras->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-validation-errors :errors="$errors" class="mb-4" />
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="field">
                            <div class="control">
                                <label for="fecha">Fecha de compra:</label>
                                <input type="date" id="fecha" name="fecha" value="{{ $compras->fecha }}"><br><br>
                            </div>
                        </div><br>
                        <div class="metodo">
                            Método de pago
                            <div>
                                <input type="radio" id="efectivo" name="metodo" value="efectivo" {{ $compras->metodo === 'efectivo' ? 'checked' : '' }}>
                                <label for="efectivo">Efectivo</label>
                            </div>
                            <div>
                                <input type="radio" id="deposito" name="metodo" value="deposito" {{ $compras->metodo === 'deposito' ? 'checked' : '' }}>
                                <label for="deposito">Depósito</label>
                            </div>
                            <div>
                                <input type="radio" id="tarjeta" name="metodo" value="tarjeta" {{ $compras->metodo === 'tarjeta' ? 'checked' : '' }}>
                                <label for="tarjeta">Tarjeta</label>
                            </div><br>
                        </div>
                        <div class="pagar">
                            <label for="total">Total a pagar: $</label>
                            <input type="text" id="total" name="total" placeholder="1222.99" value="{{ $compras->total}}"><br><br>
                        </div><br><br>
                        <div class="field">
                            <div class="control">
                                <button class="button is-block is-info is-large is-fullwidth" type="submit">
                                    Guardar cambios
                                </button>    
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <input class="button is-block is-primary is-large is-fullwidth" type="reset"
                                    value="Limpiar formulario">
                            </div>
                        </div><br>
                        </form>
                        <form action="{{ route('compras.destroy', $compras->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="field">
                            <div class="control">
                                <button class="button is-block is-danger is-large is-fullwidth" type="submit">
                                    Eliminar Compra
                                </button>    
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