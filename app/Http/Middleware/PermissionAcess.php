<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionAcess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
{
    if (!Auth::check() || !$request->user()) {
        abort(403, 'Você não está autenticado.');
    }

    if (!$request->user()->can($permission)) {
        abort(403, 'Você não tem a permissão: ' . $permission);
    }

    return $next($request);
}

}
