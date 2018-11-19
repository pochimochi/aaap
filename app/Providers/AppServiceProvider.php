<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('APP_URL') == 'https://isproj2b.benilde.edu.ph/aaap')
        \URL::forceRootUrl(\Config::get('app.url'));
        // And this if you wanna handle https URL scheme
        // It's not usefull for http://www.example.com, it's just to make it more independant from the constant value
        if (str_contains(\Config::get('app.url'), 'https://')) {
            \URL::forceScheme('https');
            //use \URL:forceSchema('https') if you use laravel < 5.4
        }
        Validator::extend('uniqueFirstAndLastName', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('users')->where('firstname', $value)
                ->where('lastname', $parameters[0])
                ->count();

            return $count === 0;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
