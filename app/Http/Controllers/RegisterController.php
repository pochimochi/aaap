<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Contact;
use App\Employer;
use App\Pwa;
use App\Relationship;
use Illuminate\Http\Request;
use App\User;



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


        $userinfo = $request->all();
        $userinfo['membershipStatus'] = 1;
        $userinfo['idVerification'] = 1;

        $temporaryaddress = $request->only([
            'tunitno' => 'unitno', 'tbldg' => 'bldg', 'tstreet' => 'street', 'tcity' => 'city',
            'tcountry' => 'countryId'
        ]);
        $permanentaddress = $request->only([
            'unitno', 'bldg', 'street', 'city', 'country'
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

        return 'You have successfully registered!';


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


}
