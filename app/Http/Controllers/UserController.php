<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Contact;
use App\Country;
use App\Employer;
use App\Image;
use App\Pwa;
use App\Relationship;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        if (Auth::user() && session('user')) {
            $user = User::all()->where('id', session('user')['id'])->first();


            /*$user = User::all()->where('userId', '=', session()->get('userId'))->first();
            $profpic = Image::all()->where('imageId', '=', $user->userProfPic)->first();

            $permanentaddress = Address::all()->where('addressId', '=', $user->permanentAddress)->first();
            $pcity = City::all()->where('cityId', '=', $permanentaddress->cityId)->first();
            $pcountry = Country::all()->where('countryId', '=', $permanentaddress->countryId)->first();
            $temporaryaddress = Address::all()->where('addressId', '=', $user->temporaryAddress)->first();
            $tcity = City::all()->where('cityId', '=', $temporaryaddress->cityId)->first();
            $tcountry = Country::all()->where('countryId', '=', $temporaryaddress->countryId)->first();
            $contact = Contact::all()->where('userId', '=', $user->userId)->first();
            $employer = Employer::all()->where('userId', '=', $user->userId)->first();
            $employerAddress = Address::all()->where('addressId', '=', $employer->employerAddress)->first();
            $relationship = Relationship::all()->where('userId', '=', $user->userId)->first();
            $pwa = Pwa::all()->where('pwaIdNumber', '=', $relationship->pwaIdNumber)->first();*/

           /* $users = array_merge($user->toArray(), $profpic->toArray(), $permanentaddress->toArray(),
                $pcity->toArray(), $pcountry->toArray(), $temporaryaddress->toArray(), $tcity->toArray(), $tcountry->toArray(), $contact->toArray(), $employer->toArray(),
                $employerAddress->toArray(), $relationship->toArray(), $pwa->toArray());*/


            if (session('role') != 4) {
                return view('pages.master.profile', ['users' => $user]);
            } else {
                return view('pages.member.profile', ['users' => $user]);
            }

        } else {
            return view('pages.master.home');
        }


    }


}
