<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class userreject
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
        if (Auth::user() && Auth::user()->validasi != "admin" && Auth::user()->validasi == "reject") {
             return $next($request);
        }

        return redirect('/login');
    }
}