<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class CheckRoleMiddleware
{
    use AuthorizesRequests;

    public function handle(Request $request, Closure $next, $role)
    {
       
        $this->authorize('check-role', $role);
        return $next($request);
    }
}
