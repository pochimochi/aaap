<?php

namespace App\Http\Controllers;

use App\Helper;
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
            'email' => 'required|max:255|exists:users',
            'subject' => 'required',
            'body' => 'required',
        ]);
        $receiver = $request['email'];
        $body = $request['body'];
        $subject = $request['subject'];

        if ($valid->passes()) {
            $helper = new helper();
            $result = $helper->emailSend($receiver, $body, $subject);
            if ($result == false) {
                \alert()->error('Email was not sent!', 'Try Again Later');
                return redirect('/login')->withErrors($result->ErrorInfo);
            } else {
                \alert()->success('Email Sent!', 'You have successfully sent the Newsletter!');
                return redirect()->back();
            }
        } else {
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
