<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de sesión</title>
    <link rel="icon" type="image/x-icon" href="/img/elma.ico" />
    <link rel="stylesheet" href="{{ asset('css/login.class') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>
<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h1>Inicio de sesión</h1>
                    <hr class="login-hr">
                    <p class="subtitle has-text-black">Por favor ingrese sus datos</p>
                    <div class="box">
                        <figure class="avatar">
                            <img src="/img/icono.png" alt="Icono">
                        </figure>
                        <form>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="email" placeholder="Correo:" autofocus="">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="password" placeholder="Contraseña:">
                                </div>
                            </div>
                            <div class="field">
                                <label class="checkbox">
                                <input type="checkbox"> Recordarme</label>
                            </div>
                            <a href="{{ url('../') }}" class="button is-block is-info is-large is-fullwidth">
                                Conectarse
                            </a>
                            <br><br>
                            <div>
                            <input class="button is-block is-danger is-large is-fullwidth" type="reset" value="Limpiar datos">
                            </div>
                        </form>
                            <br>
                            <p class="has-text-purple">
                            <a href="{{ url('/cliente/create') }}">Registrar</a> &nbsp;·&nbsp;
                            <a href="../">Olvidé mi contraseña</a> &nbsp;·&nbsp;
                            <a href="../">Ayuda</a>
                            </p>
                    </div>
                </div>
            </div>
        </div>
            <div class="derechos">
                <p style="text-align: center;"><strong>&copy; 2023 Nuestro equipo. Todos los derechos reservados.</strong></p>
            </div>
    </section>
    <script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>