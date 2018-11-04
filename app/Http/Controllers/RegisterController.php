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
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterFormRequest;


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


    public function store(RegisterFormRequest $request)
    {


        if ($request['g-recaptcha-response']) {


            $userinfo = $request->all();
            $userinfo['password'] = bcrypt($userinfo['password']);
            $userinfo['active'] = 0;
            $userinfo['role_id'] = 4;

            if($request->file('profile_id') != null){
                $file1 = $request->file('profile_id')->getClientOriginalName();
                $request->file('profile_id')->storeAs('public', $file1);
                $userinfo['profile_id'] = Images::create(['location' => $file1])->id;
            }
            if ($request->file('idverification_id') != null){
                $file2 = $request->file('idverification_id')->getClientOriginalName();
                $request->file('idverification_id')->storeAs('public', $file2);
                $userinfo['idverification_id'] = Images::create(['location' => $file2])->id;

            }


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
            $userinfo['employer_id'] = Employer::create($userinfo)->id;

            $userinfo['pwa_id'] = Pwa::create($userinfo)->id;


            $log = new logs();
            $log->savelog($userinfo['user_id'], 'User has registered');
            alert()->success('Account successfully created!', 'In order to activate your account please pay the ₱500.00 membership fee. For more details please visit our FAQs page.')->persistent('true');
            return redirect('/login');
        } else {
            return redirect('/register')->withInput();
        }


    }


}
