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
        return view('authentication.login');
    }

    public function postLogin(Request $request)
    {
        $helper = new Helper();
        $valid = Validator::make($request->all(), [
            'emailAddress' => 'required|max:255|exists:users',
            'userPassword' => 'required|max:64',
            /*'g-recaptcha-response' => 'required|captcha'*/
        ]);
        if (/*$helper->reCaptchaVerify($request['g-recaptcha-response'])->success && */
        $valid->passes()) {

            $attempt = Auth::attempt(['emailAddress' => $request['emailAddress'], 'password' => $request['userPassword']]);
            if ($attempt == true) {

                $user = Auth::user();
                \session(['user' => $user]);
                \session(['userId' => $user->userId]);
                \session(['role' => $user->userTypeId]);

                alert()->success('Login Successful!', 'Welcome ' . $user->userFirstName);
                return redirect('/home');


            } else {
                alert()->error('Login Failed', 'Email Address or Password is incorrect.');
                return redirect('/login');
            }
        } else {
            alert()->warning('Login Failed', 'Please retry your ReCaptcha');
            return redirect('/login')->withErrors($valid);
        }


    }

}