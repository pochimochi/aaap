<?php
/**
 * Created by PhpStorm.
 * User: Joyce Sison
 * Date: 17/09/2018
 * Time: 8:38 PM
 */

namespace App\Http\Controllers;


use App\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{

    public function getMember()
    {
        return view('member');
    }

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
        if ($helper->reCaptchaVerify($request['g-recaptcha-response'])->success && $valid->passes()) {


            if (Auth::attempt(['emailAddress' => $request['emailAddress'], 'password' => $request['userPassword']])) {
                alert()->success('Login Initiated', 'Successfully');
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