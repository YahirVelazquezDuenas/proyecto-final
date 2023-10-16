<style>

.navbar-brand{
    font-size: 20px;
    text-align: center;
    color: white;
}
.button {
    background-color: rgba(0, 0, 0, 0);
    font-size: 20px;
    color: white;
    border: none;
}

</style>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<div class="container">
    <div class="navbar-brand">
        <a class="navbar-item" href="javascript:history.back()">
        Volver</a>
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
            <button type="submit" class="button is-block is-fullwidth">Cerrar sesión</button>
        </form>
    </div>        
</div>