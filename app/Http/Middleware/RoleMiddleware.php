<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
         $user = $request->user(); // Récupération de l'utilisateur
        // from the request you can access user instance and role is the column in db
        if($user && $user->role === $role) {
             return $next($request);
        }

        return to_route('dashboard');
      
    }
}
