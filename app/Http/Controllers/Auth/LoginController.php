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

        if (User::all()->where('role_id', 1)->count() == 0) {
            if ($request['email'] == 'admin@aaap.com' && $request['password'] == 'admin') {
                $admin = $request->all();
                $admin['password'] = bcrypt($admin['password']);
                $admin['role_id'] = 1;
                $admin['active'] = 1;
                $admin['firstname'] = 'Admin';
                $admin['lastname'] = '';
                User::create($admin);
                alert()->warning('Admin Added!', 'Default Admin Initialized');
                return redirect('/login');
            }
        }

        $log = new logs();
        $helper = new Helper();
        $valid = Validator::make($request->all(), [
            'email' => 'required|max:255|exists:users',
            'password' => 'required|max:64',
            /*'g-recaptcha-response' => 'required|captcha'*/
        ]);
        if (/*$helper->reCaptchaVerify($request['g-recaptcha-response'])->success &&*/
        $valid->passes()) {
            $attempt = Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);
            if ($attempt == true) {
                if (Auth::user()->active == 1) {
                    $user = Auth::user();
                    \session(['user' => $user]);
                    \session(['userId' => $user->id]);
                    \session(['role' => $user->role_id]);

                    $log->savelog($user->id, 'Logged In');
                    alert()->success('Login Successful!', 'Welcome ' . $user->firstname);
                    return redirect('home');
                } else {
                    alert()->warning('Login Failed', 'Your Account is suspended.');

                    return redirect('/login');
                }


            } else {
                alert()->error('Login Failed', 'Email Address or Password is incorrect.');
                return redirect('/login');
            }
        } else {
            alert()->warning('Login Failed', 'Please retry your ReCaptcha');
            return redirect('/login')->withErrors($valid);
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