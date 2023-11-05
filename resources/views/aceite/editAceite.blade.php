<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar aceite</title>
    <link rel="icon" type="image/x-icon" href="/img/yuiico.ico" />
    <link rel="stylesheet" href="{{ asset('css/aceite/editAceite.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/aceite/editAceite.css') }}">
</head>
<body>
    <section class="hero is-success is-fullheight">
    <x-barra></x-barra> 
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h1 class="title">Editar Aceite</h1>
                    <hr class="login-hr">
                    <p class="subtitle has-text-white">Ingresa los nuevos datos</p>
                    <div class="box">
                        <form action="{{ route('aceite.update', $aceite->id_aceite) }}" method="POST">
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
                                <input class="input is-large" type="text" id="nombre" name="nombre" placeholder="Nombre: Diesel LSD"
                                autofocus="" value="{{$aceite->nombre}}">
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="tipo" name="tipo" placeholder="Tipo: Diesel" value="{{$aceite->tipo}}">
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="cantidad" name="cantidad" placeholder="Cantidad: 5200" value="{{$aceite->cantidad}}">
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="marca" name="marca" placeholder="Marca: ACME" value="{{$aceite->marca}}">
                            </div>
                        </div>
                        <br> 
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" id="descripcion" name="descripcion" placeholder="Descripción: Aceite para..." value="{{$aceite->descripcion}}" 
                                rows="3" cols="40">
                        </div><br><br>
                        <div class="pagar">
                            <label for="total">Precio: $</label>
                                <input type="text" id="precio" name="precio" placeholder="122.99" value="{{ $aceite->precio }}">
                        </div>
                        </div>
                        <br>
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
                        <form action="{{ route('aceite.destroy', $aceite->id_aceite) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="field">
                                <div class="control">
                                    <button class="button is-block is-danger is-large is-fullwidth" type="submit">
                                        Eliminar Aceite
                                    </button>    
                                </div>
                            </div>
                        </form>
                        <br>
                        <p class="has-text-purple">
                            <a href="/aceite">Regresar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <x-derechos></x-derechos>
    </section>
