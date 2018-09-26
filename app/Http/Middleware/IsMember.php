<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!session()->exists('user')) {
            // user value cannot be found in session
            alert()->warning('Oops!', 'You are not allowed to access this page.');
            return redirect('/login');

        }

        return $next($request);
    }
}
