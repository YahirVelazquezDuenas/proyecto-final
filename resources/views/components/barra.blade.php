<style>
    
.navbar-brand{
    font-size: 20px;
    text-align: center;
}

</style>

<div class="container">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ url('/dashboard') }}">
        Admin</a>
        <a class="navbar-item" href="/aceite">
        Aceites</a>
        <a class="navbar-item" href="/cliente">
        Clientes</a>
        <a class="navbar-item" href="/compras">
        Compras</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </div>        
</div>