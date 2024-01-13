<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleAccess
{

    public function handle(Request $request, Closure $next, $role): Response
    {
       abort_if(
        Auth::check() && !$request->user()->hasRole($role),
        403,
        'Você não tem permissão');
        return $next($request);
    }
}
