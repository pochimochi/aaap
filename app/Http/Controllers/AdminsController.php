<?php
/**
 * Created by PhpStorm.
 * User: Joyce Sison
 * Date: 25/09/2018
 * Time: 7:55 PM
 */

namespace App\Http\Controllers;

use App\Contact;
use App\Employer;
use App\Helper;
use App\Images;
use App\Pwa;
use Carbon\Carbon;
use DB;
use App\User;
use App\Address;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = User::all()->whereIn('role_id', ['2', '3']);
        return view('pages.admin.admins', ['admins' => $admins]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|integer',
            'firstname' => 'required|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'middlename' => 'nullable|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'lastname' => 'required|max:30|:regex/^[a-z ,.\'-]+$/i',
            'gender' => 'required',
//            'userProfPic' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
            'approvedBy' => 'nullable|string',
            'emailCode' => 'nullable',
            'email' => 'required|email|unique:users',
        ], [
            'role_id.required' => 'The administrator type must be specified.',
            'firstname.required' => 'The first name field is required.',
            'lastname.required' => 'The first name field is required.',
        ]);
        $userinfo = $request->all();
        $userinfo['status'] = 1;
        $userinfo['active'] = 0;
        $userinfo['mobile_number'] = '';
        $userinfo['landline_number'] = '';
        $userinfo['ecity'] = '';
        $userinfo['idverification_id'] = 1;
        $userinfo['permanentaddress_id'] = 0;
        $file1 = '';
        $file2 = '';
        if ($request->file() != null) {
            if ($request->file('profile_id') != null) {
                $file1 = $request->file('profile_id')->getClientOriginalName();
                $request->file('profile_id')->storeAs('public', $file1);
            }
            if ($request->file('idverification_id')) {
                $file2 = $request->file('idverification_id')->getClientOriginalName();
                $request->file('idverification_id')->storeAs('public', $file2);
            }
        }
        $userinfo['profile_id'] = Images::create(['location' => $file1])->id;
        $userinfo['idverification_id'] = Images::create(['location' => $file2])->id;
        $userinfo['tcity_id'] = City::create(['name' => ' '])->id;
        $userinfo['temporaryaddress_id'] = Address::create([
            'unitno' => '', 'bldg' => '', 'street' => '',
            'city_id' => $userinfo['tcity_id'], 'country_id' => '174'])->id;
        $userinfo['city_id'] = City::create(['name' => ''])->id;
        $userinfo['permanentaddress_id'] = Address::create([
            'unitno' => '', 'bldg' => '', 'street' => '',
            'city_id' => $userinfo['city_id'], 'country_id' => '174'])->id;
        $userinfo['user_id'] = User::create($userinfo)->id;
        Contact::create($userinfo);
        $userinfo['ecity_id'] = City::create(['name' => $userinfo['ecity']])->id;
        $userinfo['address_id'] = Address::create([
            'unitno' => '', 'bldg' => '', 'street' => '',
            'city_id' => $userinfo['ecity_id'], 'country_id' => '174'])->id;
        $userinfo['employer_id'] = Employer::create($userinfo)->id;
        $userinfo['pwa_id'] = Pwa::create($userinfo)->id;
        $link = "https://isproj2b.benilde.edu.ph/aaap/public/setPassword?key=" . $userinfo['email'] . "&time=" . Carbon::now()->format('Y-m-d%20H:i:s') . "";
        $body = "<h1>Welcome to the Association for Adults with Autism, Philippines!</h1>
<hr />
<h3>Hello!</h3>
<p>You are now a part of the content team! and&nbsp;for your account,&nbsp;Use the button below to activate your account by entering your new password.&nbsp;</p>
<p>&nbsp;</p>
<p><a href=" . url('setPassword') . "?key=" . $userinfo['email'] . "&time=" . Carbon::now()->format('Y-m-d%20H:i:s') . "" . ">Activate Account</a></p>
<p>&nbsp;</p>
<hr />
<p>Welcome to the team,&nbsp;<br />
The AAAP Team</p>
<hr />";
        $helper = new Helper();
        $result = $helper->emailSend($userinfo['email'], $body, 'Welcome to AAAP Admin!');
        if ($result == false) {
            alert()->error('Email was not sent!', 'Try Again Later');
            return redirect()->back()->withErrors($result->ErrorInfo);
        } else {
            alert()->success('New Administrator Added', 'Email link was successfully sent!');
            return redirect()->back();
        }
    }

    public function changeStatus($userId, $status)
    {
        $paid = "<h1>Welcome to AAAP</h1>

<hr />
<p>Your Account is now activated! You may now log in to the website <a href='".url('login')."' target='_blank'>Click Here</a> </p>";
        $unpaid = "<h1>Your account has been deactivated</h1>

<hr />
<p>Please pay your dues to continue your membership. </p>";
        $helper = new Helper();
        $admins = User::find($userId);
        $admins->active = $status;
        if ($admins->save()) {
            if($status == 1){
                $helper->emailSend($admins->email, $paid, 'Welcome to AAAP!');
            }else{
                $helper->emailSend($admins->email, $unpaid, 'You account has been deactivated');
            }

            toast('Status Changed!', 'success', 'bottom-right');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong 😞');
            return redirect()->back();
        }
    }

    public function setPassword(Request $request)
    {
        if ($request->exists('time') == true) {
            $time1 = $request->query('time');
            $email = $request['key'];
            $carbontime = Carbon::parse($time1);
            $minutespassed = $carbontime->diffInMinutes(Carbon::now());
            if ($minutespassed <= 1140) {
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
}