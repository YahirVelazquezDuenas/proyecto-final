<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Aceites</title>
    <link rel="icon" type="image/x-icon" href="/img/tatsumakiico.ico" />
    <link rel="stylesheet" href="{{ asset('css/createAceite.class') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/createAceite.css') }}">
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
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <form action="{{ url('/aceite') }}" method="POST"> 
                        @csrf
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="nombre" name="nombre" placeholder="Nombre: Diesel LSD"
                                autofocus="" required pattern="^.{1,49}$">
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="tipo" name="tipo" placeholder="Tipo: Diesel" pattern="^.{0,49}$">
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="cantidad" name="cantidad" placeholder="Cantidad: 5200" pattern="^\d{1,8}(\.\d{1,2})?$">
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="marca" name="marca" placeholder="Marca: ACME" pattern="^.{0,49}$">
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="descripcion" name="descripcion" placeholder="Descripción: Aceite para..." 
                                rows="3" cols="40" pattern="^.{0,254}$">
                            </div>
                        </div>
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
                            <a href="../">Inicio</a> &nbsp;·&nbsp;
                            <a href="/aceite">Regresar</a>
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