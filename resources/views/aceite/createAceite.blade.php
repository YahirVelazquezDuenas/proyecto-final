<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear aceite</title>
    <link rel="icon" type="image/x-icon" href="/img/tatsumakiico.ico" />
    <link rel="stylesheet" href="{{ asset('css/aceite/createAceite.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/aceite/createAceite.css') }}">
</head>
<body>
    <section class="hero is-success is-fullheight">
    <x-barra></x-barra> 
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h1 class="title">Registrar nuevo Aceite</h1>
                    <hr class="login-hr">
                    <p class="subtitle has-text-white">Ingresa los datos</p>
                    <div class="box">
                    <x-validation-errors :errors="$errors" class="mb-4" />
                    
                    @if(session('error'))
                        <div class="error-message">
                            {{ session('error') }}
                        </div>
                    @endif
                        <form action="{{ url('/aceite') }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="nombre" name="nombre" placeholder="Nombre: Diesel LSD"
                                autofocus="" value="{{ old('nombre') }}" required>
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="tipo" name="tipo" placeholder="Tipo: Diesel" value="{{ old('tipo') }}">
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="cantidad" name="cantidad" placeholder="Cantidad: 5200" value="{{ old('cantidad') }}">
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="marca" name="marca" placeholder="Marca: ACME" value="{{ old('marca') }}">
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="descripcion" name="descripcion" placeholder="Descripción: Aceite para..." 
                                rows="3" cols="40" value="{{ old('descripcion') }}">
                            </div>
                        </div>
                        <div class="pagar">
                                <label for="total">Precio: $</label>
                                    <input type="text" id="precio" name="precio" placeholder="122.99" value="{{ old('precio') }}" required>
                        </div><br><br>
                        <br>
                        <label for="archivo">Cargar Archivo:</label>
                        <input type="file" name="archivo" id="archivo">
                        <br>
                        <div class="field">
                            <div class="control">
                                <button class="button is-block is-info is-large is-fullwidth" type="submit">
                                    Enviar
                                </button>    
                            </div>
                        </div>
                        <br>
                        <div class="field">
                                <div class="control">
                                    <input class="button is-block is-primary is-large is-fullwidth" type="reset"
                                        value="Limpiar formulario">
                                </div>
                            </div>
                        </form>
                        <br>
                        <p class="has-text-purple">
                            <a href="/dashboard">Inicio</a> &nbsp;·&nbsp;
                            <a href="/aceite">Regresar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <x-derechos></x-derechos>
    </section>
</body>
</html>