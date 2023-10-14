<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        // Divide la cadena de roles permitidos en un array
        $allowedRoles = explode('|', $roles);

        // Obtiene el nombre del rol del usuario actual en minúsculas
        $roleName = strtolower($request->user()->role->name);

        // Si el rol del usuario es gerente, permite el acceso a todas las rutas
        if ($roleName == 'admin') {
            return $next($request);
        }

        // Verifica si el nombre del rol del usuario está en la lista de roles permitidos
        if (!in_array($roleName, $allowedRoles)) {
            return abort(403, __('Sin autorización'));
        }
        return $next($request);
    }
}
