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


    Route::group(['middleware' => 'member'], function () {
        //member
        Route::get('/profile', 'UserController@profile');
        Route::get('/member', function () {
            return view('member');
        });


        Route::group(['middleware' => 'contentmanager'], function () {
            //announcements
            Route::get('/announcement', 'AnnouncementsController@announcement');
            Route::post('/announcementSubmit', 'AnnouncementsController@store');
            Route::get('/announcementedit/{announcementId}', 'AnnouncementsController@edit');
            Route::post('edit/announcementedit/{announcementId}', 'AnnouncementsController@update');
            Route::post('announcements/changeStatus', array('as' => 'changeStatus', 'uses' => 'AnnouncementsController@changeStatus'));

            //events
            Route::post('/eventsubmit', 'EventController@store');
            Route::get('/event', 'EventController@event');
            Route::get('/eventedit/{eventId}', 'EventController@edit');
            Route::post('edit/eventedit/{eventId}', 'EventController@update');

        });
        Route::group(['middleware' => 'writer'], function () {
            //articles
            Route::get('/article', 'ArticleController@article');
            Route::post('/articlesubmit', 'ArticleController@store');
            Route::get('/articleedit/{articleId}', 'ArticleController@edit');
            Route::post('edit/articleedit/{articleId}', 'ArticleController@update');
        });


    });

    //logout
    Route::get('/logout', function () {
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





