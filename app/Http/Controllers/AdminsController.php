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
use App\Images;
use App\Pwa;
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
            'password' => 'required|min:8|max:64|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).+$/',
            'approvedBy' => 'nullable|string',
            'emailCode' => 'nullable',
            'email' => 'required|unique:users|email',
        ]);

        $userinfo = $request->all();
        $userinfo['password'] = bcrypt($userinfo['password']);
        $userinfo['status'] = 1;
        $userinfo['active'] = 1;
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


        alert()->success('New Administrator', 'Added');
        return redirect()->back();
    }

    public function changeStatus($userId, $status)
    {
        $admins = User::find($userId);
        $admins->active = $status;
        if ($admins->save()) {
            toast('Status Changed!', 'success', 'bottom-right');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong 😞');
            return redirect()->back();
        }
    }
}
