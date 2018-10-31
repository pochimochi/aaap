<?php

namespace App\Http\Controllers;

use App\announcements;
use App\Articles;
use App\AuditLog;
use App\Event;
use App\HitCounter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function getRealIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function Home()
    {

        $counter['count'] = $this->getRealIp();
        HitCounter::create($counter);
        if (Auth::user() && session('user')) {
            if (session('role') != 4) {

                if (session('role') == 3) {


                    $users = User::where('role_id', 4)->get();
                    $events = new Event();
                    $articles = new Articles();
                    $announcements = new Announcements();
                    $counts = new HitCounter();

                    $audittoday = AuditLog::whereDate('created_at', today())->count();
                    $auditminus1 = AuditLog::whereDate('created_at', today()->subDays(1))->count();
                    $auditminus2 = AuditLog::whereDate('created_at', today()->subDays(2))->count();
                    $auditminus3 = AuditLog::whereDate('created_at', today()->subDays(3))->count();
                    $chart = new \App\Charts\SampleChart();
                    $chart->options([
                        'legend' => [
                            'labels' => ['fontColor' => 'black'],
                        ],
                        'ticks' => ['fontColor' => '#fff'],
                        'title' => ['display' => 'true', 'text' => 'Number of activities per day', 'fontSize' => '22'],
                    ]);
                    $chart->labels([today()->toDateString(), today()->subDays(1)->toDateString(), today()->subDays(2)->toDateString()
                        , today()->subDays(3)->toDateString()]);
                    $chart->dataset('Activities', 'bar', [$audittoday, $auditminus1, $auditminus2, $auditminus3])->backgroundColor('#448cff')->color('#448cff')->lineTension('0.4');
                    return view('pages.master.dashboard', compact(['chart', 'users', 'events', 'counts', 'articles', 'announcements']));
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

    public function faqs()
    {
        return view('pages.master.faqs');
    }




}