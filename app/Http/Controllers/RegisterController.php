<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Contact;
use App\Employer;
use App\Helper;
use App\Pwa;
use App\Relationship;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authentication.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authentication.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $helper = new Helper();

        $valid = Validator::make($request->all(), [
            //'userTypeId' => 'required|integer',
            'userFirstName' => 'required|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'userMiddleName' => 'nullable|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'userLastName' => 'required|max:30|:regex/^[a-z ,.\'-]+$/i',
            'userGenderId' => 'required',
            'userProfPic' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
            'userPassword' => 'required|max:64',
            //'idVerification' => 'required|max:300|mimes:jpeg,jpg,png|image',
            //'membershipStatus' => 'required|integer',
            //'statusDate' => 'required|date',
            'approvedBy' => 'nullable|string',
            'emailCode' => 'nullable',
            'emailAddress' => 'required|unique:users|email',
            'unitno' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'bldg' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'street' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'city' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'countryId' => 'required|integer|exists:countries,countryId',
            'tunitno' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tbldg' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tstreet' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tcity' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tcountry' => 'nullable|integer|exists:countries,countryId',
            'eunitno' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'ebldg' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'estreet' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'ecity' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'ecountry' => 'nullable|integer|exists:countries,countryId',
            'employerName' => 'required|string|regex:/^[a-z ,.\'-]+$/i',
            'employerAddress' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'employerContactNumber' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'description' => 'nullable|string',
            'pwaLastName' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaFirstName' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaMiddleName' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaGenderId' => 'required|integer',
            'pwaOccupation' => 'nullable|string',
            'landlineNumber' => 'nullable|integer',
            'mobileNumber' => 'nullable|string|(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})'


        ]);
        if ($valid->passes()) {
            if ($helper->reCaptchaVerify($request['g-recaptcha-response'])->success) {

                $userinfo = $request->all();
                $userinfo['membershipStatus'] = 1;
                $userinfo['idVerification'] = 1;
                $userinfo['userTypeId'] = 4;

                $temporaryaddress = $request->only([
                    'tunitno' => 'unitno', 'tbldg' => 'bldg', 'tstreet' => 'street', 'tcity' => 'city',
                    'tcountry' => 'countryId'
                ]);

                $permanentaddress = $request->only([
                    'unitno', 'bldg', 'street', 'city', 'countryId'
                ]);
                $employeraddress = $request->only([
                    'eunitno' => 'unitno', 'ebldg' => 'bldg', 'estreet' => 'street', 'ecity' => 'city',
                    'ecountry' => 'countryId'
                ]);


                $tcityid = City::create(['name' => $temporaryaddress['city']]);
                $temporaryaddress['cityId'] = $tcityid->id;
                $taddressid = Address::create($temporaryaddress);

                $pcityid = City::create(['name' => $permanentaddress['city']]);
                $permanentaddress['cityId'] = $pcityid->id;
                $paddressid = Address::create($permanentaddress);

                $userinfo['temporaryAddress'] = $taddressid->id;
                $userinfo['permanentAddress'] = $paddressid->id;

                $userid = User::create($userinfo);
                $userinfo['userId'] = $userid->id;
                Contact::create($userinfo);


                $ecityid = City::create(['name' => $employeraddress['city']]);
                $employeraddress['cityId'] = $ecityid->id;
                $eaddress = Address::create($employeraddress);
                $userinfo['employerAddress'] = $eaddress->id;
                $userinfo['userId'] = $userid->id;
                Employer::create($userinfo);


                $pwaid = Pwa::create($userinfo);
                $userinfo['pwaIdNumber'] = $pwaid->id;
                $userinfo['userId'] = $userid->id;
                Relationship::create($userinfo);

                alert()->success('Registration Successful!!', 'Welcome to AAAP');
                return redirect('/home');
            } else {
                return redirect('/register')->withInput();
            }
        } else {
            return redirect('/register')->withErrors($valid)->withInput();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


}
