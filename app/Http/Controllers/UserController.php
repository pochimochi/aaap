<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Contact;
use App\Country;
use App\Employer;
use App\Http\Requests\EditProfileRequest;
use App\Images;
use App\Pwa;
use App\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        if (Auth::user() && session('user')) {
            $users = User::all()->where('id', session('user')['id'])->first();


            return view('pages.member.profile', compact(['users']));

        } else {
            return redirect('home');
        }
    }

    public function edit()
    {
        $users = User::all()->where('id', session('user')['id'])->first();
        $countries = Country::all();

        return view('pages.member.profileedit', compact(['users', 'countries']));

    }

    public function update(EditProfileRequest $request)
    {

        $array = $request->all();

        if ($request->file('profile.location')) {
            $profile = Images::find($array['profileid']);
            $array['location'] = $request->file('profile.location')->getClientOriginalName();
            $request->file('profile.location')->move('storage', $array['location']);
            $profile->update($array);
        }
        if ($request->file('idverification.location')) {
            $verification = Images::find($array['verificationid']);
            $array['location'] = $request->file('idverification.location')->getClientOriginalName();
            $request->file('idverification.location')->move('storage', $array['location']);

            $verification->update($array);
        }



        $userupdate = User::find($array['userid']);
        $userupdate->update($array);
        $paddress = Address::find($array['pcityid']);
        $paddress->update($array['paddress']);
        $pcity = City::find($array['pcityid']);
        $pcity->update($array['paddress']);
        $pprovince = Province::find($array['pprovinceid']);
        $pprovince->update($array['paddress']);
        $taddress = Address::find($array['tcityid']);
        $taddress->update($array['taddress']);
        $tcity = City::find($array['tcityid']);
        $tcity->update($array['taddress']);
        $tprovince = Province::find($array['tprovinceid']);
        $tprovince->update($array['paddress']);
        $eaddress = Address::find($array['ecityid']);
        $eaddress->update($array['eaddress']);
        $ecity = City::find($array['ecityid']);
        $ecity->update($array['eaddress']);
        $eprovince = Province::find($array['eprovinceid']);
        $eprovince->update($array['eaddress']);
        $pwa = Pwa::find($array['pwaid']);
        $pwa->update($array);
        $employer = Employer::find($array['employerid']);
        $employer->update($array);
        $contact = Contact::find($array['contactid']);
        $contact->update($array);

        return redirect('member/profile');
    }
}
