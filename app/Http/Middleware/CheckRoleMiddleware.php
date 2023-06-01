<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CheckRoleMiddleware
{
    use AuthorizesRequests;

    public function handle(Request $request, Closure $next, $role)
    {
        $this->authorize('check-role', $role);
        return $next($request);
    }
}

Gate::define('sem-perfil', function ($user) {
    return !$user->perfil_id;
});