<?php
/**
 * Created by PhpStorm.
 * UserController: Joyce Sison
 * Date: 17/09/2018
 * Time: 8:38 PM
 */

namespace App\Http\Controllers;


use App\Helper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{


    public function index()
    {

        if (!Auth::user() && session()->exists('user')) {
            if (Auth::user()->userTypeId == 4) {
                return redirect('/home');
            } elseif (Auth::user()->userTypeId != 4 ) {
                return redirect('/home');
            }
        } else{
            return view('pages.authentication.login');
        }


    }

    public function store(Request $request)
    {
        $helper = new Helper();
        $valid = Validator::make($request->all(), [
            'emailAddress' => 'required|max:255|exists:users',
            'userPassword' => 'required|max:64',
            /*'g-recaptcha-response' => 'required|captcha'*/
        ]);
        if ($helper->reCaptchaVerify($request['g-recaptcha-response'])->success &&
            $valid->passes()) {

            $attempt = Auth::attempt(['emailAddress' => $request['emailAddress'], 'password' => $request['userPassword']]);
            if ($attempt == true) {
                if (Auth::user()->membershipStatus == 1) {
                    $user = Auth::user();
                    \session(['user' => $user]);
                    \session(['userId' => $user->userId]);
                    \session(['role' => $user->userTypeId]);


                    alert()->success('Login Successful!', 'Welcome ' . $user->userFirstName);
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
        Session::flush();
        session()->flush();
        Auth::logout();
        return redirect('/home');
    }

}