<?php
/**
 * Created by PhpStorm.
 * User: Joyce Sison
 * Date: 26/09/2018
 * Time: 8:03 PM
 */

namespace App\Http\Controllers;

use App\Helper;
use App\logs;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;


class MembersController extends Controller
{
    public function index()
    {

        $members = User::all()->where('role_id', 4);
        foreach ($members as $member) {
            if (Carbon::parse($member->statusdate)->lt(Carbon::now())) {
                $member->active = 0;

                $member->save();
            }
        }

        return view('pages.admin.members', ['members' => $members]);


    }

    /**
     * @param $userId
     * @param $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus($userId, $status)
    {

        $paid = "<h1>Welcome to AAAP</h1>

<hr />
<p>Your Account is now activated! You may now log in to the website <a href='" . url('login') . "' target='_blank'>Click Here</a> </p>";
        $unpaid = "<h1>Your account has been deactivated</h1>

<hr />
<p>Please pay your dues to continue your membership. </p>";
        $helper = new Helper();
        $admins = User::find($userId);
        $admins->active = $status;
        if ($admins->save()) {
            if ($status == 1) {
                $user = User::find($userId);
                $user->approvedby = session('user')['id'];
                $user->statusdate = now()->addYear(1);
                $user->save();
                $helper->emailSend($admins->email, $paid, 'Welcome to AAAP!');
            } else {
                $helper->emailSend($admins->email, $unpaid, 'Your account has been deactivated');
            }

            toast('Status Changed!', 'success', 'bottom-right');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong 😞');
            return redirect()->back();
        }
    }
    public function reminder(Request $request)
    {

        $user = User::find($request->id);
        $request->validate([
            'subject' => 'required|max:70',
            'body' => 'required'
        ]);
        $helper = new Helper();
        $helper->emailSend($user->email, $request->body, $request->subject);
        $log = new logs();
        $log->savelog(session('user')['id'], 'Sent a Message [' . $request->subject . ']');
        alert()->success('Success!', 'Message has been sent!');
        return back();




    }
}


