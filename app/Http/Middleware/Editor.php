<?php
/**
 * Created by PhpStorm.
 * User: Joyce Sison
 * Date: 18/11/2018
 * Time: 10:12 PM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Editor
{
    public function handle($request, Closure $next)
    {
        if (!Auth::user() || !session()->exists('user')) {
            return redirect('/login');
        } else {
            if (Auth::user()->role_id != 5) {
                // user value cannot be found in session
                alert()->warning('Oops!', 'You need to be an Editor to access this page.');
                return redirect('/home');
            }
        }
        return $next($request);
    }
}