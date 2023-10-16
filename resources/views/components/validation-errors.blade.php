@if ($errors->any())
    <div class="error-message">
        {{ __('No se pudo realizar la operación con éxito.') }}
        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li class="error-list-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif