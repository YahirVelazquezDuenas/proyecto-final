<?php

namespace App\Policies;

use App\Models\User;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Compra $compra)
    {
        return $user->cliente->id_cliente === $compras->cliente->id_cliente;
    }

}
