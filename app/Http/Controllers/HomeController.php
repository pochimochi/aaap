<?php

namespace App\Http\Controllers;

use App\AuditLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function Home()
    {
        if (Auth::user() && session('user')) {
            if (session('role') != 4) {
                $audittoday = AuditLog::whereDate('created_at', today())->count();
                $yesterday_users = User::whereDate('created_at', today()->subDays(1))->count();
                $chart = new \App\Charts\SampleChart();
                $chart->options([
                    'legend' => [
                        'labels' => ['fontColor' => 'black'],
                    ],
                    'ticks' => ['fontColor' => '#fff'],
                    'title' => ['display' => 'true', 'text' => 'Number of activities per day', 'fontSize' => '22'],
                ]);
                $chart->labels([today()->toDateString(), today()->subDays(1)->toDateString()]);
                $chart->dataset('Activities', 'bar', [$audittoday, $yesterday_users])->backgroundColor('#448cff')->color('#448cff')->lineTension('0.4');
                if (session('role') == 3) {
                    return view('pages.master.dashboard', compact('chart'));
                } elseif (session('role') == 2) {
                    return redirect('writer/articles/create');
                } elseif (session('role') == 1) {
                    return redirect('admin/adminMaintenance ');
                }
            } else {
                return view('pages.master.home');
            }
        } else {
            return view('pages.master.home');
        }
    }


}