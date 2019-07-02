<?php

namespace App\Http\Middleware;

use App\Model\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role_id = Auth::user()->role_id;
        $role = Role::find($role_id);
        $access = false;
        foreach ($role->permissions as $permission) {
            if ($permission->route == $request->route()->getName()) {
                $access = true;
            }
        }
        if (!$access){
            abort(404, 'You do not have Permission to create this page');
    }
        return $next($request);
    }
}
