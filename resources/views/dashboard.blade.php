<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/img/fatla.ico" />
    <title>Admin - Free Bulma template</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
    <x-barra></x-barra>
    <div class="container">
        <div class="columns">
            <div class="column is-3 ">
                <aside class="menu is-hidden-mobile">
                    <p class="menu-label">
                        General
                    </p>
                    <p class="menu-label">
                        Aceites
                    </p>
                    <ul class="menu-list">
                        <li><a href="/aceite/create">Añadir Aceite</a></li>
                        <li><a href="/aceite">Ver Aceites Registrados</a></li>
                    </ul>
                    <p class="menu-label">
                        Clientes
                    </p>
                    <ul class="menu-list">
                        <li><a href="/cliente/create">Añadir Cliente</a></li>
                        <li><a href="/cliente">Ver Clientes Registrados</a></li>
                    </ul>
                    <p class="menu-label">
                        Compras
                    </p>
                    <ul class="menu-list">
                        <li><a href="/compras/create">Añadir Compra</a></li>
                        <li><a href="/compras">Ver Compras Registradas</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column is-9">
                <section class="hero is-custom-purple is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Buenas Sr. Ingeniero.
                            </h1>
                            <h2 class="subtitle">
                                Las ventas van bien el día de hoy!
                            </h2>
                        </div>
                    </div>
                </section>
                <section class="info-tiles">
                    <div class="tile is-ancestor has-text-centered">
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">{{ $numeroDeClientes }}</p>
                                <p class="subtitle">Clientes</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">{{ $numeroDeAceites }} </p>
                                <p class="subtitle">Aceites</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">{{ $numeroDeCompras }}</p>
                                <p class="subtitle">Compras</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">{{ $comprasDelDia }}</p>
                                <p class="subtitle">Compras el día de hoy</p>
                            </article>
                        </div>
                    </div>
                </section> 
            <div class="columns"> 
                <div class="column is-6">        
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Buscar Aceite
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <form action="{{ url('/aceite/showAceite') }}" method="GET">
                                    <div class="control has-icons-left has-icons-right">
                                        <input class="input is-large" type="number" id="id" name="id_aceite" placeholder="ID de aceite">
                                        <span class="icon is-medium is-left">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                    <br>
                                    <div class="field">
                                        <div class="control">
                                            <button class="button is-primary" type="submit">Buscar</button>
                                        </div>
                                        @if(session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Buscar Compras
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <form action="{{ url('/compras/showCompras') }}" method="GET">
                                    <div class="control has-icons-left has-icons-right">
                                        <input class="input is-large" type="number" id="id" name="id_compra" placeholder="ID de compra">
                                        <span class="icon is-medium is-left">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                    <br>
                                    <div class="field">
                                        <div class="control">
                                            <button class="button is-primary" type="submit">Buscar</button>
                                        </div>
                                        @if(session('errorc'))
                                            <div class="alert alert-danger">
                                                {{ session('errorc') }}
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script async type="text/javascript" src="../js/bulma.js"></script>
    <x-derechos></x-derechos>
</body>
</html>
