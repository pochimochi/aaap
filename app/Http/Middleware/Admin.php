<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (session('role') != 1) {
            // user value cannot be found in session
            alert()->warning('Oops!', 'You need to be an Admin to access this page.');
            return redirect('/home');

        }

        return $next($request);
    }
}
