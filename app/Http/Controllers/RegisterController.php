<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Contact;
use App\Employer;
use App\Helper;
use App\Pwa;
use App\Relationship;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authentication.register');
    }


    public function create()
    {
        return view('authentication.register');
    }

    public function reset()
    {
        return view('pages.resetform');
    }

    public function savepassword(Request $request)
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

    public function newPassword(Request $request)
    {
        if ($request->exists('time') == true) {
            $time1 = $request->query('time');

            $carbontime = Carbon::parse($time1);
            $minutespassed = $carbontime->diffInMinutes(Carbon::now());
            if ($minutespassed <= 35) {
                return redirect('/newpassform/' . $request['key']);
            } else {
                \alert()->error('Whoops!', 'The Link has expired! Please try again.');
                return redirect('/login');
            }
        } else {
            alert()->error('Whoops!', 'There was an error!');
            return redirect('/login');
        }


    }

    public function resetPasswordEmail(Request $request)
    {
        $emailAddress = $request['email'];
        $check = DB::table('users')->select('userPassword as password', 'emailAddress')->where('emailAddress', '=', $emailAddress)->get();

        if ((!empty($check->get('0')->emailAddress)) == 1) {
            $password = $check->get('0')->password;
            $emailAddress = $check->get('0')->emailAddress;
            $link = "http://localhost/aaap/public/newpass?key=" . $emailAddress . "&reset=" . $password . "&time=" . Carbon::now() . "'";
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

    public function store(Request $request)
    {
        $helper = new Helper();

        $valid = Validator::make($request->all(), [
            //'userTypeId' => 'required|integer',
            'userFirstName' => 'required|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'userMiddleName' => 'nullable|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'userLastName' => 'required|max:30|:regex/^[a-z ,.\'-]+$/i',
            'userGenderId' => 'required',
            'userProfPic' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
            'userPassword' => 'required|max:64',
            //'idVerification' => 'required|max:300|mimes:jpeg,jpg,png|image',
            //'membershipStatus' => 'required|integer',
            //'statusDate' => 'required|date',
            'approvedBy' => 'nullable|string',
            'emailCode' => 'nullable',
            'emailAddress' => 'required|unique:users|email',
            'unitno' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'bldg' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'street' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'city' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'countryId' => 'required|integer|exists:countries,countryId',
            'tunitno' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tbldg' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tstreet' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tcity' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tcountry' => 'nullable|integer|exists:countries,countryId',
            'eunitno' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'ebldg' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'estreet' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'ecity' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'ecountry' => 'nullable|integer|exists:countries,countryId',
            'employerName' => 'required|string|regex:/^[a-z ,.\'-]+$/i',
            'employerAddress' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'employerContactNumber' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'description' => 'nullable|string',
            'pwaLastName' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaFirstName' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaMiddleName' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaGenderId' => 'required|integer',
            'pwaOccupation' => 'nullable|string',
            'landlineNumber' => 'nullable|integer',
            'mobileNumber' => 'nullable|string|(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})'


        ]);
        if ($valid->passes()) {
            if ($helper->reCaptchaVerify($request['g-recaptcha-response'])->success) {

                $userinfo = $request->all();
                $userinfo['membershipStatus'] = 1;
                $userinfo['idVerification'] = 1;
                $userinfo['userTypeId'] = 4;

                $temporaryaddress = $request->only([
                    'tunitno' => 'unitno', 'tbldg' => 'bldg', 'tstreet' => 'street', 'tcity' => 'city',
                    'tcountry' => 'countryId'
                ]);

                $permanentaddress = $request->only([
                    'unitno', 'bldg', 'street', 'city', 'countryId'
                ]);
                $employeraddress = $request->only([
                    'eunitno' => 'unitno', 'ebldg' => 'bldg', 'estreet' => 'street', 'ecity' => 'city',
                    'ecountry' => 'countryId'
                ]);


                $tcityid = City::create(['name' => $temporaryaddress['city']]);
                $temporaryaddress['cityId'] = $tcityid->id;
                $taddressid = Address::create($temporaryaddress);

                $pcityid = City::create(['name' => $permanentaddress['city']]);
                $permanentaddress['cityId'] = $pcityid->id;
                $paddressid = Address::create($permanentaddress);

                $userinfo['temporaryAddress'] = $taddressid->id;
                $userinfo['permanentAddress'] = $paddressid->id;

                $userid = User::create($userinfo);
                $userinfo['userId'] = $userid->id;
                Contact::create($userinfo);


                $ecityid = City::create(['name' => $employeraddress['city']]);
                $employeraddress['cityId'] = $ecityid->id;
                $eaddress = Address::create($employeraddress);
                $userinfo['employerAddress'] = $eaddress->id;
                $userinfo['userId'] = $userid->id;
                Employer::create($userinfo);


                $pwaid = Pwa::create($userinfo);
                $userinfo['pwaIdNumber'] = $pwaid->id;
                $userinfo['userId'] = $userid->id;
                Relationship::create($userinfo);

                alert()->success('Registration Successful!!', 'Welcome to AAAP');
                return redirect('/home');
            } else {
                return redirect('/register')->withInput();
            }
        } else {
            return redirect('/register')->withErrors($valid)->withInput();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


}
