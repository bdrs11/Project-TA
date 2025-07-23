<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        // Cek apakah user login dan memiliki role yang sesuai
        if (Auth::check() && Auth::user()->role_id == $role) {
            return $next($request);
        }

        abort(403, 'Anda tidak memiliki akses.');
    }
}
