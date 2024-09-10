<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Rediriger si l'utilisateur n'est pas authentifié ou n'a pas le rôle requis
            return redirect('/login');
        }

        return $next($request);
    }

}
