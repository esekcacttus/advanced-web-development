<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $allowedRole)
    {
        $authenticatedUser = Auth::user();
        $allowedRoles = explode(";", $allowedRole);
        if(!in_array($authenticatedUser->role, $allowedRoles)){
            return abort(403);
        }
        return $next($request);
    }
}
