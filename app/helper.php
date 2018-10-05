<?php
namespace App;

class Helper{
    function reCaptchaVerify($request){
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
}



