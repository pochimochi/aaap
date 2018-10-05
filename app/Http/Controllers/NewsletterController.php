<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;

class NewsletterController extends Controller
{

    public function index()
    {
        return view('pages.writer.newsletter');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'emailAddress' => 'required|max:255|exists:users',
            'subject' => 'required',
            'body' => 'required',
        ]);
        if ($valid->passes()){
            $bodyhtml = $request['body'];
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
            $mail->SetFrom($request['emailAddress']); // send to mail
            /*   $mail->AddBCC(); // send to mail*/
            $mail->Subject = $request['subject'];
            $mail->ContentType = 'text/plain';
            $mail->isHTML(true);

            $mail->Body = $bodyhtml;
            // you may also use $mail->Body =       file_get_contents('your_mail_template.html');
            $mail->AddAddress($request['emailAddress']);
            // you may also use this format $mail->AddAddress ($recipient);

            if (!$mail->Send()) {
                \alert()->error('Email was not sent!', 'Try Again Later');
                return redirect('/login')->withErrors($mail->ErrorInfo);
            } else {
                \alert()->success('Email Sent!', 'You have successfully sent the Newsletter!');
                return redirect()->back();
            }
        }else{
            return redirect()->back()->withErrors($valid)->withInput();
        }





    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
