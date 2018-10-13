<?php

namespace App;

use PHPMailer\PHPMailer\PHPMailer;

class Helper
{
    function reCaptchaVerify($request)
    {
        $key = "6Lfj6XAUAAAAADmbWGqfzyG3Zzu5QOlbG90qW1Dd";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => $key,
            'response' => $request,
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        ]);

        $returncode = json_decode(curl_exec($ch));
        curl_close($ch);
        return $returncode;
    }

    function emailSend($receiver, $body, $subject)
    {
        $bodyhtml = $body;
        //https://stackoverflow.com/questions/38309422/phpmailer-server-smtp-error-password-command-failed-smtp-connect-failed

        $mail = new PHPMailer(true);

        $mail->isSMTP();                       // telling the class to use SMTP
        $mail->SMTPDebug = 0;
        // 0 = no output, 1 = errors and messages, 2 = messages only.

        $mail->SMTPAuth = true;                // enable SMTP authentication
        $mail->SMTPSecure = "tls";              // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com";        // sets Gmail as the SMTP server
        $mail->Port = 587;                     // set the SMTP port for the GMAIL

        $mail->Username = "AAAPToday@gmail.com";  // Gmail username
        $mail->Password = "AAAP4lyf";      // Gmail password

        $mail->CharSet = 'windows-1250';
        $mail->SetFrom($receiver); // send to mail
        /*   $mail->AddBCC(); // send to mail*/
        $mail->Subject = $subject;
        $mail->ContentType = 'text/plain';
        $mail->isHTML(true);

        $mail->Body = $bodyhtml;
        // you may also use $mail->Body =       file_get_contents('your_mail_template.html');
        $mail->AddAddress($receiver);
        // you may also use this format $mail->AddAddress ($recipient);
        return $result = $mail->Send();


    }
}



