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
    Route::get('/', 'HomeController@Home');

    Route::get('/about', function () {
        return view('pages.about');
    });

    Route::get('/home1', function () {
        return view('pages.home1');
    });

//Route::resource('/registersubmit', 'RegisterController@store');

    Route::post('/registersubmit', 'RegisterController@store');
    Route::get('/register', 'RegisterController@index');

    Route::post('/loginSubmit', [
        'uses' => 'LoginController@postLogin',
        'as' => 'loginSubmit'
    ]);

    Route::get('/login', [
        'uses' => 'LoginController@index',
        'as' => 'login'
    ]);

    Route::get('/member', [
        'uses' => 'LoginController@getMember',
        'as' => 'member'
    ]);


    Route::get('/announcement', 'AnnouncementsController@announcement');
    Route::post('/announcementSubmit', 'AnnouncementsController@store');
    Route::get('/announcementedit/{announcementId}','AnnouncementsController@edit');
    Route::post('edit/announcementedit/{announcementId}','AnnouncementsController@update');

});





