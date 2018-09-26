<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function () {
    //main pages
    Route::get('/home', 'HomeController@Home');
    Route::get('/about', function () {
        return view('pages.about');
    });

    Route::group(['middleware' => 'member'], function () {
        //member
        Route::get('/profile', 'UserController@profile');


        Route::group(['middleware' => 'eventmanager'], function () {
            //events
            Route::post('/eventsubmit', 'EventController@store');
            Route::post('/eventedit', 'EventController@edit');
            Route::get('/event', 'EventController@event');
        });
        Route::group(['middleware' => 'writer'], function () {
            //articles
            Route::post('/articlesubmit', 'ArticleController@store');
            Route::get('/article', function () {
                return view('pages.admin.article');
            });
        });


    });
    //logout
    Route::get('/logout', function(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    });

    //forgot password
    Route::get('/forgotpassword', 'RegisterController@reset');
    Route::post('/sendemail', 'RegisterController@resetPasswordEmail');
    Route::get('/newpass', 'RegisterController@newPassword');
    Route::get('/newpassform/{email}', function ($email) {
        return view('pages.newpassword', compact('email', $email));
    });
    Route::post('/savepassword', 'RegisterController@savepassword');

    //register
    Route::post('/registersubmit', 'RegisterController@store');
    Route::get('/register', 'RegisterController@index');

    //login
    Route::post('/loginSubmit', 'LoginController@postLogin');
    Route::get('/login', 'LoginController@index')->name('login');


});





