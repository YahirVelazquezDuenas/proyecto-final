<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Compra</title>
    <link rel="icon" type="image/x-icon" href="/img/fubukiico.ico" />
    <link rel="stylesheet" href="{{ asset('css/compras/createCompras.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/compras/createCompras.css') }}">
</head>
<body>
<section class="hero is-success is-fullheight">
    <x-barra></x-barra>
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h1 class="title">Registrar compras</h1>
                    <hr class="login-hr">
                        <p class="subtitle has-text-white">Ingresa los datos</p>
                            <div class="box">
                                <x-validation-errors :errors="$errors" class="mb-4" />
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                {{ session('error') }}
                                    </div>
                                @endif 
                                <form action="{{ url('/compras') }}" method="POST"> 
                                @csrf
                                    <div class="fecha">
                                        <label for="fecha">Fecha de compra:</label>
                                        <input type="date" id="fecha" name="fecha" placeholder="" value="{{ old('fecha') }}" required>
                                    </div><br>
                                    <div class="metodo">
                                        Método de pago
                                        <div>
                                            <input type="radio" id="efectivo" name="metodo" value="efectivo" {{ old('metodo') == 'efectivo' ? 'checked' : '' }}>
                                            <label for="efectivo">Efectivo</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="deposito" name="metodo" value="deposito" {{ old('metodo') == 'deposito' ? 'checked' : '' }}>
                                            <label for="deposito">Depósito</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="tarjeta" name="metodo" value="tarjeta" {{ old('metodo') == 'tarjeta' ? 'checked' : '' }}>
                                            <label for="tarjeta">Tarjeta</label>
                                        </div><br>
                                        </div>
                                        <label class="label">Selecciona un aceite y su cantidad:</label>
                                                        <div class="control">
                                                            <div class="select">
                                                                <select name="aceites[]">
                                                                    @foreach($aceites as $aceite)
                                                                        <option value="{{ $aceite->id_aceite }}">{{ $aceite->nombre }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div><br><br>
                                                            <div class="field">
                                                                <div class="control">
                                                                    <input class="input" type="number" name="cantidad[]" required placeholder="Cantidad">
                                                                </div>
                                                            </div>
                                                        </div>
                                        <div class="aceites-container">
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                var contenedorAceites = document.querySelector(".aceites-container");
                                                document.getElementById("agregarAceite").addEventListener("click", function() {
                                                    var nuevoCampo = document.createElement("div");
                                                    nuevoCampo.className = "field";
                                                    nuevoCampo.innerHTML = `
                                                        <br><label class="label">Selecciona un aceite y su cantidad:</label>
                                                        <div class="control">
                                                            <div class="select">
                                                                <select name="aceites[]">
                                                                    @foreach($aceites as $aceite)
                                                                        <option value="{{ $aceite->id_aceite }}">{{ $aceite->nombre }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div><br><br>
                                                            <input class="input" type="number" name="cantidad[]" placeholder="Cantidad">
                                                        </div>
                                                    `;
                                                    contenedorAceites.appendChild(nuevoCampo);
                                                });
                                            });
                                            </script>
                                        </div><br>
                                        <div class="control">
                                                <button class="button is-block is-info is-small is-fullwidth" type="button"
                                                id="agregarAceite">Agregar Aceite</button>
                                            </div><br>
                                        <div class="cliente">
                                            <label for="id_cliente">Cliente:</label>
                                            <select id="id_cliente" name="id_cliente">
                                                @foreach($clientes as $cliente)
                                                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div><br><br>
                                        <div class="field">
                                            <div class="control">
                                                <button class="button is-block is-info is-large is-fullwidth" type="submit">
                                                Enviar</button>
                                            </div>
                                        </div>        
                                        <div class="field">
                                            <div class="control">
                                                <input class="button is-block is-primary is-large is-fullwidth" type="reset"
                                                value="Limpiar formulario">
                                            </div>
                                        </div>
                                </form><br>
                                    <p class="has-text-purple">
                                    <a href="/dashboard">Inicio</a> &nbsp;·&nbsp;
                                    <a href="/compras">Regresar</a>
                                    </p>
                            </div>
                </div>
            </div>
        </div>
            <x-derechos></x-derechos>
</section>
    <script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>