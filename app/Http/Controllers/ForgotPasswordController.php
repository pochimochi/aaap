<?php

namespace App\Http\Controllers;

use App\Helper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;

class ForgotPasswordController extends Controller
{
    public function create()
    {
        return view('pages.master.resetform');
    }

    public function store(Request $request)
    {
        $emailAddress = $request['email'];
        $check = User::all()->where('email', '=', $emailAddress)->first();
        if ($check != null) {
            $password = $check->password;
            $link =  url('forgotpassword')."?key=" . $emailAddress . "&reset=" . $password . "&time=" . Carbon::now() . "";
            $body = '<html>
        <body>
        <h1>Password Reset</h1>
        <hr />
        <h3>Hello!</h3>
        <p>You recently requested to reset your password for your account. Use the button below to reset it.&nbsp;<strong>This password reset is only valid for the next 24 hours.</strong></p>
        <p>&nbsp;</p>
        <a href="' . $link . '">Reset Link</a>
        <p>If you did not request a password reset, please ignore this email.</p>
        <p>Thanks,&nbsp;<br />The AAAP Team</p>
        <p>&nbsp;</p>
        <hr />
        </body>
        </html>';
            $helper = new helper();
            $result = $helper->emailSend($request['email'], $body, 'Forgot password');
            if ($result == false) {
                \alert()->error('Email was not sent!', 'Try Again Later');
                return redirect()->back()->withErrors($result->ErrorInfo);
            } else {
                \alert()->success('Email Sent!', 'You have successfully sent an Email!');
                return redirect('/login');
            }
        } else {
            \alert()->error('Your Email does not exist!', 'Try Again.');
            return redirect('/forgotpassword');
        }
    }

    public function getKeys(Request $request)
    {
        if ($request->exists('time') == true) {
            $time1 = $request->query('time');
            $email = $request['key'];
            $carbontime = Carbon::parse($time1);
            $minutespassed = $carbontime->diffInMinutes(Carbon::now());
            if ($minutespassed <= 35) {
                return view('pages.master.newpassword', compact('email', $email));
            } else {
                \alert()->error('Whoops!', 'The Link has expired! Please try again.');
                return redirect('/login');
            }
        } else {
            alert()->error('Whoops!', 'There was an error!');
            return redirect('/login');
        }
    }

    public function saveNewPassword(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'password' => 'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'password_confirmation' => 'required'
        ]);
        if ($valid->passes()) {
            $query = DB::table('users')
                ->where('email', '=', $request['emailAddress'])
                ->update(['password' => bcrypt($request['password']), 'active' => '1']);
            if ($query == 1) {
                alert()->success('Success!!', 'Your password has been saved!');
                return redirect('/login');
            } else {
                alert()->error('Error!!', 'Something went wrong :(');
                return redirect('/login');
            }
        } else {

            return back()->withErrors($valid);
        }
    }
}