<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Middleware\NonAdmin as Middleware;

class NonAdmin
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && !$user->isAdmin()) {
            return $next($request);
        }

        return redirect('/dashboard'); // O redirige a donde desees para administradores
    }
}