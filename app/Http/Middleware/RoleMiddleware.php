<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role, $guard = 'web'): Response
    {
        if (!Auth::guard($guard)->check()) {
            abort(401); // Non authentifié
        }

        if (Auth::guard($guard)->user()->role !== $role) {
            abort(403); // Accès interdit
        }

        return $next($request);
    }
}



