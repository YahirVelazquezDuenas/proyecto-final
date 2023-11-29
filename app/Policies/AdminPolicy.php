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

    public function isAdmin(User $user)
    {
        return $user->role_id === 2; // Suponiendo que el role_id para administradores es 2
    }
}