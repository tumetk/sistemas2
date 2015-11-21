<?php

namespace App\Http\Middleware;

use Closure;

class VerifyPermissionsMiddleware
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
        $user_permissions = $request->User()->permissions;
        $user_groups      = $request->User()->groups;
        foreach ($user_groups as $group) {
            $group_permissions = $group->permissions;
            foreach ($group_permissions as $permission) {
                $user_permissions->push($permission);
            }
        }
        $current_route = $request->route()->getAction()['as'];
        $equals        = false;
        foreach ($user_permissions as $p) {
            if ($p->route == $current_route)
                $equals = true;
        }
        if (!$equals)
            return redirect()->back()->with('errors', trans('messages.denied.permission'));
        return $next($request);

    }
}
