<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Contact;
use App\Country;
use App\Employer;
use App\Helper;
use App\Image;
use App\Images;
use App\logs;
use App\Pwa;
use App\Relationship;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
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
        if (Auth::user() && session()->exists('user')) {
            if (Auth::user()->userTypeId == 4) {
                return redirect('/home');
            } elseif (Auth::user()->userTypeId != 4) {
                return redirect('/dashboard');
            }
        } else {
            $country = Country::all();
            return view('pages.authentication.register', ['country' => $country]);
        }
    }


    public function create()
    {
        $this->index();
    }


    public function store(Request $request)
    {
        $helper = new Helper();

        $request->validate([
            //'userTypeId' => 'required|integer',
            'firstname' => 'required|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'middlename' => 'nullable|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'lastname' => 'required|max:30|:regex/^[a-z ,.\'-]+$/i',
            'gender' => 'required',
            //'profpic' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
            'password' => 'required|max:64',
            //'idverification' => 'required|max:300|mimes:jpeg,jpg,png|image',
            //'membershipStatus' => 'required|integer',
            //'statusDate' => 'required|date',
            'approvedBy' => 'nullable|string',
            'emailCode' => 'nullable',
            /*'email' => 'required|unique:users,email|email',*/
            'unitno' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'bldg' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'street' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'city' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'country_id' => 'required|integer|exists:countries,id',
            'tunitno' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tbldg' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tstreet' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tcity' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tcountry' => 'nullable|integer|exists:countries,id',
            'eunitno' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'ebldg' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'estreet' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'ecity' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'ecountry' => 'nullable|integer|exists:countries,id',
            'employerName' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'employerAddress' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'employerContactNumber' => 'nullable',
            'description' => 'nullable|string',
            'pwaLastName' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaFirstName' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaMiddleName' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaGenderId' => 'nullable|integer',
            'pwaOccupation' => 'nullable|string',
            'landlineNumber' => 'nullable',
            'mobileNumber' => 'nullable|string'


        ]);

        if (/*$helper->reCaptchaVerify($request['g-recaptcha-response'])->success*/
            1 == 1) {


            $userinfo = $request->all();
            $userinfo['password'] = bcrypt($userinfo['password']);
            $userinfo['active'] = 1;
            $userinfo['role_id'] = 4;
            $file1 = $request->file('profile_id')->getClientOriginalName();
            $file2 = $request->file('idverification_id')->getClientOriginalName();
            $request->file('profile_id')->storeAs('public', $file1);
            $request->file('idverification_id')->storeAs('public', $file2);

            $userinfo['profile_id'] = Images::create(['location' => $file1])->id;
            $userinfo['idverification_id'] = Images::create(['location' => $file2])->id;

            $userinfo['tcity_id'] = City::create(['name' => $userinfo['tcity']])->id;
            $userinfo['temporaryaddress_id'] = Address::create([
                'unitno' => $userinfo['tunitno'], 'bldg' => $userinfo['tbldg'], 'street' => $userinfo['tstreet'],
                'city_id' => $userinfo['tcity_id'], 'country_id' => $userinfo['tcountry']])->id;

            $userinfo['city_id'] = City::create(['name' => $userinfo['city']])->id;
            $userinfo['permanentaddress_id'] = Address::create($userinfo)->id;

            $userinfo['user_id'] = User::create($userinfo)->id;
            Contact::create($userinfo);

            $userinfo['ecity_id'] = City::create(['name' => $userinfo['ecity']])->id;
            $userinfo['address_id'] = Address::create([
                'unitno' => $userinfo['eunitno'], 'bldg' => $userinfo['ebldg'], 'street' => $userinfo['estreet'],
                'city_id' => $userinfo['ecity_id'], 'country_id' => $userinfo['ecountry']])->id;
            $userinfo['employer_id']= Employer::create($userinfo)->id;

            $userinfo['pwa_id'] = Pwa::create($userinfo)->id;


            $log = new logs();
            $log->savelog($userinfo['user_id'], 'User has registered');
            alert()->success('Registration Successful!!', 'Welcome to AAAP');
            return redirect('/login');
        } else {
            return redirect('/register')->withInput();
        }


    }


}
