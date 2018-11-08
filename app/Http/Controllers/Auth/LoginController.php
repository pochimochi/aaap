<?php
/**
 * Created by PhpStorm.
 * UserController: Joyce Sison
 * Date: 17/09/2018
 * Time: 8:38 PM
 */

namespace App\Http\Controllers;


use App\Helper;
use App\logs;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{


    public function index()
    {

        if (Auth::user() && session('user')) {
            if (Auth::user()->role_id == 4) {
                return redirect('/home');
            } elseif (Auth::user()->role_id != 4) {
                return redirect('/home');
            }
        } else {
            return view('pages.authentication.login');
        }


    }

    public function store(Request $request)
    {


        $log = new logs();
        $request->validate([
            'email' => 'required|max:255|exists:users',
            'password' => 'required|max:64',
            'g-recaptcha-response' => 'required'
        ], [
            'g-recaptcha-response.required' => 'Please check the recaptcha box before logging in.'
        ]);

        $attempt = Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);
        if ($attempt == true) {
            if (Auth::user()->active == 1) {
                $user = Auth::user();
                session(['user' => $user]);
                session(['userId' => $user->id]);
                session(['role' => $user->role_id]);

                $log->savelog($user->id, 'Logged In');
                alert()->success('Login Successful!', 'Welcome ' . $user->firstname);
                return redirect('home');
            } else {
                alert()->warning('Login Failed', 'Your account is inactive.');

                return redirect('/login');
            }


        } else {
            alert()->error('Login Failed', 'Email Address or Password is incorrect.');
            return redirect('/login');
        }

    }

    public function logout()
    {
        $log = new logs();
        $log->savelog(session('userId'), 'Logged Out');
        Session::flush();
        session()->flush();
        Auth::logout();
        return redirect('/home');
    }

}
