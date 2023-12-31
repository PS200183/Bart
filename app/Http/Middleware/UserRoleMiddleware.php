<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            foreach ($roles as $role) {
                if (Auth::user()->role == $role) {
                    return $next($request);
                }
            }
        }

        return redirect(401);
    }
}
