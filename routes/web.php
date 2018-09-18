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


    Route::post('/registersubmit', 'RegisterController@store');
    Route::get('/register', 'RegisterController@index');


    Route::post('/loginSubmit', [
        'uses' => 'LoginController@postLogin',
        'as' => 'loginSubmit'
    ]);

    Route::get('/member', [
        'uses' => 'LoginController@getMember',
        'as' => 'member'
    ]);

    Route::get('/login', [
        'uses' => 'LoginController@index',
        'as' => 'login'
    ]);



    Route::post('/eventsubmit', 'EventController@store');
    Route::post('/eventedit', 'EventController@edit');

    Route::get('/event','EventController@event');

    Route::post('/articlesubmit', 'ArticleController@store');
    Route::get('/article', function(){
        return view('admin.article');
    });


});





