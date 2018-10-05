<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function Home()
    {
        if (Auth::user() && session('user')) {
            if (session('role') != 4) {
                return view('pages.master.dashboard');
            } else {
                return view('pages.master.home');
            }
        } else {
            return view('pages.master.home');
        }

    }

}
