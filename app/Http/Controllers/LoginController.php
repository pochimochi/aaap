<?php
/**
 * Created by PhpStorm.
 * User: Joyce Sison
 * Date: 17/09/2018
 * Time: 8:38 PM
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getMember()
    {
        return view('member');
    }

    public function index()
    {
        return view('authentication.login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt(['emailAddress' => $request['emailAddress'], 'password' => $request['userPassword']])) {
            return "Welcome";
        }
        else{
            return "Invalid";
        }

    }

}