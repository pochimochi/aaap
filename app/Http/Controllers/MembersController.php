<?php
/**
 * Created by PhpStorm.
 * User: Joyce Sison
 * Date: 26/09/2018
 * Time: 8:03 PM
 */

namespace App\Http\Controllers;

use DB;


class MembersController
{
    public function index(){
        $members = DB::select('select * from users where userTypeId = 4');
        return view('admin.members', ['members' => $members]);


    }


}