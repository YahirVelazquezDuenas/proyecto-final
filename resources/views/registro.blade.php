<!DOCTYPE html>
<html>
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
                    <h1>Registro de usuario</h1>
                    <hr class="login-hr">
                    <p class="subtitle has-text-white">Por favor ingrese sus datos</p>
                    <div class="box">
                        <form>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" id="nombre" name="nombre" placeholder="Nombre:" autofocus="">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" id="direccion" name="direccion" placeholder="Dirección:">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Genero:</label>
                                    <div class="control">
                                    <label class="radio">
                                        <input type="radio" id="masculino" name="genero" value="masculino">
                                        Masculino</label>
                                    <label class="radio">
                                        <input type="radio" id="femenino" name="genero" value="femenino">
                                        Femenino</label>
                                    </div>
                            </div>
                            <div class="field">
                                <label class="label">Otro:</label>
                                <div class="control">
                                    <input class="input" type="text" id="especifique" name="especifique" placeholder="Especifique su género:">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" id="telefono" name="telefono:" placeholder="Teléfono:" required pattern=".{10,}">
                                    <br><em><strong>No se permiten menos de diez digitos</strong></em>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="email" id="correo" name="correo" placeholder="correo@ejemplo.com" required>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="password" id="contraseña" name="contraseña" placeholder="Contraseña:" required pattern=".{6,}">
                                    <br><em><strong>No se permiten menos de seis caracteres</strong></em>
                                </div>
                            </div>
                            <a href="{{ url('../') }}" class="button is-block is-info is-large is-fullwidth">
                                Registrar
                            </a>
                            <br><br>
                            <div>
                            <input class="button is-block is-danger is-large is-fullwidth" type="reset" value="Limpiar formulario">
                            </div>
                            
                        </form>
                            <br>
                            <p class="has-text-purple">
                            <a href="{{ url('/login') }}">Regresar</a>
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