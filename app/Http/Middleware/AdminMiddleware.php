<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario está autenticado y es administrador
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request); // Si es admin, continua la solicitud
        }

        // Si no es admin, redirige al inicio o una página de error
        return redirect()->route('home'); // o redirect()->route('home');
    }
}
