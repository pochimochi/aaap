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
        if (!Auth::user() || !session()->exists('user')) {
            return redirect('/login');
        } else {
            if (Auth::user()->userTypeId != 1) {
                // user value cannot be found in session
                alert()->warning('Oops!', 'You need to be a Writer to access this page.');
                return redirect('/home');

            }
        }

        return $next($request);
    }
}
