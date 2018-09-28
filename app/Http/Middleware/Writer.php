<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Writer
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
        if (session('role') != 2) {
            // user value cannot be found in session
            alert()->warning('Oops!', 'You need to be a Writer to access this page.');
            return redirect('/home');

        }

        return $next($request);
    }
}
