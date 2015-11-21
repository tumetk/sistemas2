<?php

namespace App\Http\Middleware;

use Closure;

class SelfEditMiddleware
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
        if ($request->route()->id == $request->User()->id) {
            return redirect()->back()->with('errors', trans('messages.denied.operation'));
        }
        return $next($request);
    }
}
