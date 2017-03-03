<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission=null)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        if (!$request->user()->hasRole($role)) {
            abort(403, 'Acceso no autorizado');
        }
        if ($permission != null){
            if (!$request->user()->can($permission)) {
                abort(403, 'Acceso no autorizado');
            }
        }

        return $next($request);
    }
}
