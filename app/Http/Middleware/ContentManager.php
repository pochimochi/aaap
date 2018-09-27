<?php

namespace App\Http\Middleware;

use Closure;

class ContentManager
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
        if (session('role') != '3') {
            // user value cannot be found in session
            alert()->warning('Oops!', 'You need to be an Content Manager to access this page.');
            return redirect('/home');

        }

        return $next($request);
    }
}
