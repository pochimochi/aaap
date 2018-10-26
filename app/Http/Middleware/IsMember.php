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

        if (!Auth::user() || !session()->exists('user')) {
            // user value cannot be found in session
            alert()->warning('Oops!', 'You are not allowed to access this page.');
            return redirect('/home');

        }elseif((session('role')) && session('role') != 4){
            return redirect('/home');
        }

        return $next($request);
    }
}
