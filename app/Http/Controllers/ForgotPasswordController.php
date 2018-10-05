<?php

namespace App\Http\Controllers;

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
        $check = DB::table('users')->select('userPassword as password', 'emailAddress')->where('emailAddress', '=', $emailAddress)->get();

        if ((!empty($check->get('0')->emailAddress)) == 1) {
            $password = $check->get('0')->password;
            $emailAddress = $check->get('0')->emailAddress;
            $link = "http://localhost/aaap/public/forgotpassword?key=" . $emailAddress . "&reset=" . $password . "&time=" . Carbon::now() . "";
            $bodyhtml = '
<html>
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
            //https://stackoverflow.com/questions/38309422/phpmailer-server-smtp-error-password-command-failed-smtp-connect-failed

            $mail = new PHPMailer(true);

            $mail->isSMTP();                       // telling the class to use SMTP
            $mail->SMTPDebug = 2;
            // 0 = no output, 1 = errors and messages, 2 = messages only.

            $mail->SMTPAuth = true;                // enable SMTP authentication
            $mail->SMTPSecure = "tls";              // sets the prefix to the servier
            $mail->Host = "smtp.gmail.com";        // sets Gmail as the SMTP server
            $mail->Port = 587;                     // set the SMTP port for the GMAIL

            $mail->Username = "AAAPToday@gmail.com";  // Gmail username
            $mail->Password = "AAAP4lyf";      // Gmail password

            $mail->CharSet = 'windows-1250';
            $mail->SetFrom($emailAddress); // send to mail
            $mail->AddBCC('cpbasco13@gmail.com'); // send to mail
            $mail->Subject = "Password Reset";
            $mail->ContentType = 'text/plain';
            $mail->isHTML(true);

            $mail->Body = $bodyhtml;
            // you may also use $mail->Body =       file_get_contents('your_mail_template.html');
            $mail->AddAddress($emailAddress);
            // you may also use this format $mail->AddAddress ($recipient);

            if (!$mail->Send()) {
                \alert()->error('Email was not sent!', 'Try Again Later');
                return redirect('/login')->withErrors($mail->ErrorInfo);
            } else {
                \alert()->success('Email Link Set!', 'Please check your Email for the confirmation link!');
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

            'password' => 'required|confirmed',
            'password_confirmation' => 'required'


        ]);
        if ($valid->passes()) {
            $query = DB::table('users')
                ->where('emailAddress', '=', $request['emailAddress'])
                ->update(['userPassword' => bcrypt($request['password'])]);
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
