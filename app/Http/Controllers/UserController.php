<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        if (Auth::user() && session('user')) {
            $user = User::all()->where('id', session('user')['id'])->first();


            if (session('role') != 4) {
                return view('pages.master.profile', ['users' => $user]);
            } else {
                return view('pages.member.profile', ['users' => $user]);
            }

        } else {
            return redirect('home');
        }


    }


}
