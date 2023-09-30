<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de usuario</title>
    <link rel="icon" type="image/x-icon" href="/img/shinobuico.ico" />
    <link rel="stylesheet" href="{{ asset('css/registro.class') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/registro.css') }}">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h1 class="title">Registro de usuario</h1>
                    <hr class="login-hr">
                    <p class="subtitle has-text-white">Por favor ingrese sus datos</p>
                    <div class="box">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ url('/cliente') }}" method="POST">
                            @csrf
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" id="nombre" name="nombre" placeholder="Nombre: Pedro Castro Salcedo"
                                        autofocus="" required pattern="^.{1,49}$">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" id="direccion" name="direccion" placeholder="Dirección: Av. Sim 9877-21. Col. Pachín." required pattern="^.{1,100}$">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" id="usuario" name="usuario" placeholder="Usuario: pedro32" required pattern="^.{6,10}$"><em><strong>Entre 6 y 10 caracteres</strong></em>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" id="telefono" name="telefono" placeholder="Teléfono: +52 33 1248 9772" required pattern="^(\+\d{2}\s?)?(\(?\d{3}\)?[\s.-]?)?\d{3}[\s.-]?\d{4}(\s?ext\s?\d+)?$"><em><strong>No se permiten menos de diez digitos</strong></em>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" id="correo" name="correo" placeholder="Correo: pedro@hotmail.com" required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" id="contraseña" name="contraseña" placeholder="Contraseña: pedtgi6" required pattern="^.{6,10}$"><em><strong>Entre 6 y 10 caracteres</strong></em>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" id="comentario" name="comentario" placeholder="Comentario: Traer trompa de cochino." pattern="^.{0,254}$">
                                </div>
                            </div>
                            <!-- Botón Registrar -->
                            <div class="field">
                                <div class="control">
                                    <button class="button is-block is-info is-large is-fullwidth" type="submit">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="field">
                                <div class="control">
                                    <input class="button is-block is-danger is-large is-fullwidth" type="reset"
                                        value="Limpiar formulario">
                                </div>
                            </div>
                        </form>
                        <br>
                        <p class="has-text-purple">
                            <a href="javascript: history.go(-1)">Regresar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="derechos">
            <p style="text-align: center;"><strong>&copy; 2023 Nuestro equipo. Todos los derechos reservados.</strong></p>
        </div>
    </section>
    <script src="{{ asset('js/bulma.js') }}"></script>
</body>

</html>