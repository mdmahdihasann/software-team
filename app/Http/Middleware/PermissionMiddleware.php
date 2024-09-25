<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $allPermissions=Permission::all();
            foreach($allPermissions as $key=>$permission){
                Gate::define($permission->slug,function(User $user) use($permission) {
                    return $user->hasPermissions($permission->slug);
                });
            }   
        }
        return $next($request);
    }
}
