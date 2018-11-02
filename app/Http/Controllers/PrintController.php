<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PrintController extends Controller
{
    public function MemberStatus()
    {
        if (session('user')) {
            if (session('user')['role_id'] == 3) {
                $users = User::where('role_id', 4)->get();

                $pdf = App::make('dompdf.wrapper');
                $pdf->loadView('pages.contentsmanager.reports.memberpaid', compact('users'));
                return $pdf->stream();
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }


    }
}
