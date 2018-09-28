<?php
/**
 * Created by PhpStorm.
 * User: Joyce Sison
 * Date: 25/09/2018
 * Time: 7:55 PM
 */

namespace App\Http\Controllers;

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
        $admins = User::all()->whereIn('userTypeId', ['2', '3']);
        return view('pages.admin.admins', ['admins' => $admins]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'userTypeId' => 'required|integer',
            'userFirstName' => 'required|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'userMiddleName' => 'nullable|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'userLastName' => 'required|max:30|:regex/^[a-z ,.\'-]+$/i',
            'userGenderId' => 'required',
//            'userProfPic' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
            'userPassword' => 'required|min:8|max:64|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).+$/',
            'approvedBy' => 'nullable|string',
            'emailCode' => 'nullable',
            'emailAddress' => 'required|unique:users|email',
        ]);

        $userinfo = $request->all();
        $userinfo['userPassword'] = bcrypt($userinfo['userPassword']);
        $userinfo['membershipStatus'] = 1;
        $userinfo['idVerification'] = 1;
        $userinfo['permanentAddress'] = 0;

        $userid = User::create($userinfo);
        $userinfo['userId'] = $userid->id;

        alert()->success('New Administrator', 'Added');
        return redirect()->back();
    }

    public function changeStatus(Request $request)
    {
        dd($request->all());
        $admins = User::find($request->id)->first();
//$admins = Admin
        $admins->membershipStatus = $request->membershipStatus;
        $admins->save();
        alert()->success('Successfully', 'changed status');
        return redirect('members');
    }
}
