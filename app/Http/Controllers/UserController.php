<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        if (Auth::user() && session('user')) {
            $users = User::all()->where('id', session('user')['id'])->first();
            $countries = Country::all();
            if (session('role') != 4) {
                return view('pages.master.profile', compact(['users', 'countries']));
            } else {
                return view('pages.member.profile', compact(['users', 'countries']));
            }
        } else {
            return redirect('home');
        }
    }
}