<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->can('isAdmin', User::class)) {
            return $next($request);
        }

        abort(403, 'No autorizado.');
    }
}