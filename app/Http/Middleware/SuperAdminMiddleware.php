<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminMiddleware
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
        if ($request->user("admin") && $request->user("admin")->is_super == true) {
            return $next($request);
        }
        return response()->view('404');
    }
}
