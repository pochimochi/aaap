<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PrintController extends Controller
{
    public function MemberStatus()
    {
        $users = User::where('role_id', 4)->get();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pages.contentsmanager.reports.memberpaid', compact('users'));
        return $pdf->stream();
    }
}
