<?php
/**
 * Created by PhpStorm.
 * User: Joyce Sison
 * Date: 17/09/2018
 * Time: 8:38 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

        $key = "6Lfj6XAUAAAAADmbWGqfzyG3Zzu5QOlbG90qW1Dd";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => $key,
            'response' => request('g-recaptcha-response'),
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        ]);

        $returncode = json_decode(curl_exec($ch));
        curl_close($ch);

        if ($returncode->success) {
            $request->validate([
                'emailAddress' => 'required|max:255|',
                'userPassword' => 'required|max:64',
                /*'g-recaptcha-response' => 'required|captcha'*/
            ]);


            if (Auth::attempt(['emailAddress' => $request['emailAddress'], 'password' => $request['userPassword']])) {
                alert()->success('Login Initiated', 'Successfully');
                return view('pages.home');


            } else {
                alert()->error('Login Failed', 'Email Address or Password is incorrect.');
                return view('authentication.login');
            }
        } else {
            alert()->warning('Login Failed', 'Please retry your ReCaptcha');
            return view('authentication.login');
        }


    }

}