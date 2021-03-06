<?php
/**
 * Created by PhpStorm.
 * User: Joyce Sison
 * Date: 26/09/2018
 * Time: 8:03 PM
 */

namespace App\Http\Controllers;

use App\User;
use DB;


class MembersController extends Controller
{
    public function index(){
        $members = DB::select('select * from users where userTypeId = 4');
        return view('pages.admin.members', ['members' => $members]);


    }
    public function changeStatus($userId, $status)
    {
        $members = User::find($userId);
        $members->membershipStatus = $status;
        if ($members->save()) {
            toast('Status Changed!', 'success', 'bottom-right');
            return redirect('members');
        } else {
            alert()->error('Oops!', 'something went wrong 😞');
            return redirect()->back();
        }
    }
}


