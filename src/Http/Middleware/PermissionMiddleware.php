<?php
namespace Leeuwenkasteel\Auth\Http\Middleware;

use Closure;

class PermissionMiddleware{
    public function handle($request, Closure $next, $permission = null){
        if($permission !== null && !Auth()->user()->can($permission)) {
            return redirect()->back()->with('error',trans('auth::messages.no_access'));
        }

        return $next($request);
    }
}