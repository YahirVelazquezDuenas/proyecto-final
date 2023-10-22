<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
    <link rel="icon" type="image/x-icon" href="/img/violetico.ico" />
    <link rel="stylesheet" href="{{ asset('css/cliente/editCliente.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cliente/editCliente.css') }}">
</head>
<body>
    <section class="hero is-success is-fullheight">
    <x-barra></x-barra> 
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h1 class="title">Editar Cliente</h1>
                    <hr class="login-hr">
                    <p class="subtitle has-text-white">Ingresa los nuevos datos</p>
                    <div class="box">
                        <form action="{{ route('cliente.update', $cliente->id_cliente) }}" method="POST">
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
                                <input class="input is-large" type="text" id="nombre" name="nombre" placeholder="Nombre: Pedro Castro Salcedo"
                                autofocus="" value="{{$cliente->nombre}}">
                            </div>
                        </div><br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="direccion" name="direccion" placeholder="Dirección: Av. Sim 9877-21. Col. Pachín."
                                value="{{$cliente->direccion}}">
                            </div>
                        </div><br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="telefono" name="telefono" placeholder="Teléfono: +52 123 456 7890" value="{{$cliente->telefono}}"><br><em><strong>No se permiten menos de diez digitos</strong></em>
                            </div>
                        </div><br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="correo" name="correo" placeholder="Correo: pedro@hotmail.com" value="{{$cliente->correo}}"">
                            </div>
                        </div><br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="comentario" name="comentario" placeholder="Comentario: Soy un nuevo ciente." value="{{$cliente->comentario}}">
                            </div>
                        </div><br>
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
                        </div>
                        </form><br> 
                        <form action="{{ route('cliente.destroy', $cliente->id_cliente) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="field">
                                <div class="control">
                                    <button class="button is-block is-danger is-large is-fullwidth" type="submit">
                                        Eliminar Cliente
                                    </button>    
                                </div>
                            </div>
                        </form>
                        <br>
                        <p class="has-text-purple">
                            <a href="/cliente">Regresar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <x-derechos></x-derechos>
    </section>
    </body>
</html>