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
use App\logs;


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
//            'profpic' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
            'password' => 'required|min:8|max:64|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).+$/',
            'approvedBy' => 'nullable|string',
            'emailCode' => 'nullable',
            'email' => 'required|unique:users|email',
        ]);

        $userinfo = $request->all();
        $userinfo['password'] = bcrypt($userinfo['password']);
        $userinfo['status'] = 1;
        $userinfo['idverification_id'] = 1;
        $userinfo['permanentaddress_id'] = 0;

        $userid = User::create($userinfo);
        $userinfo['id'] = $userid->id;

        $log = new logs();
        $log->savelog(session('user')['id'], 'Added a New User');
        alert()->success('New Administrator', 'Added');
        return redirect()->back();
    }

    public function changeStatus($userId, $status)
    {
        $admins = User::find($userId);
        $admins->active = $status;
        if ($admins->save()) {
            $log = new logs();
            $log->savelog(session('user')['id'], 'Changed User Status');
            toast('Status Changed!', 'success', 'bottom-right');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong 😞');
            return redirect()->back();
        }
    }
}
