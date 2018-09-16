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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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
        $employer = $request->only([
            'userId', 'employerName', 'employerAddress', 'employerContactNumber'
        ]);
        $contact = $request->only([
            'userId','landlineNumber', 'mobileNumber', 'emailAddress'
        ]);
        $pwa = $request->only([
            'pwaFirstName', 'pwaMiddleName', 'pwaLastName', 'pwaGenderId', 'occupation'
        ]);
        $relationship = $request->only([
            'pwaIdNumber', 'userId', 'description'
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
        $contact['userId'] = $userid->id;
        $contactid = Contact::create($contact);


        $ecityid = City::create(['name' => $employeraddress['city']]);
        $employeraddress['cityId'] = $ecityid->id;
        $eaddress = Address::create($employeraddress);
        $employer['employerAddress'] = $eaddress->id;
        $employer['userId'] = $userid->id;
        $employerid = Employer::create($employer);


        $pwaid = Pwa::create($pwa);
        $relationship['pwaIdNumber'] = $pwaid->id;
        $relationship['userId'] = $userid->id;
        $relationshipid = Relationship::create($relationship);

        return 'You have successfully registered!';
        /*$input = $request->all();

        $cityid = City::create($input);
        $addressid = Address::create($input);
        // dd($addressid->id);

        $input["password"] = Hash::make($input["password"]);
        $input["userTypeId"] = 1;
        $input["permanentAddress"] = $addressid->id;
        $input["temporaryAddress"] = $addressid->id;
        $input["membershipStatus"] = 1;
        return User::create($input);*/

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
