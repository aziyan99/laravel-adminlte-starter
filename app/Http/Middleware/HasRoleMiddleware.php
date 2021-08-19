<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $roles = Role::get();
            if ($request->user()->hasAnyRole($roles)) {
                return $next($request);
            } else {
                abort('403');
            }
        } else {
            abort('404');
        }
    }
}
