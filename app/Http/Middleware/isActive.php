<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isActive
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
        // dd(auth()->check());
        if (auth()->check() && !auth()->user()->is_active) {
            Auth::logout();
            return redirect()->route('guest')->with(notification('error', 'You have been BANNED'));
        }
        return $next($request);
    }
}
