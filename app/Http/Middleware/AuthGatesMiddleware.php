<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AuthGatesMiddleware
{
    /**
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roles = Role::with('permissions')->get();
        $permissions = [];

        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissions[$permission->name][] = $role->id;
            }
        }

        foreach ($permissions as $name => $roles) {
            Gate::define($name, function (User $user) use ($roles) {
                return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
            });
        }

        return $next($request);
    }
}
