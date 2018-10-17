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
    Route::get('/profile', 'UserController@profile');
    //---------------------------------------------------------------------------------
    Route::group(['middleware' => 'member', 'prefix' => 'member'], function () {
        //member

        Route::post('/member/articles/find', 'ArticleController@searching');
        Route::get('/member/articles/find', 'ArticleController@searching');
        Route::get('articles/archived', 'ArticleController@archived');
        Route::resource('articles', 'ArticleController')->only(['index', 'show']);
        Route::get('announcements/type/{type}', 'AnnouncementsController@indexSelect');
        Route::resource('announcements', 'AnnouncementsController')->only(['index', 'show']);

        //EventMembers
        Route::get('/userevent', 'EventController@userevent');
        Route::get('/userjoin/{userId}', 'EventController@userjoin');
        Route::get('/search', 'EventController@search');
        Route::get('/userjoins/{eventId}', 'EventController@userjoins');
    });
    //-------------------------------------------------------------------------------------
    Route::group(['middleware' => 'admingroup'], function () {
        //---------------------------------------------------------------------------------
        Route::group(['middleware' => 'contentmanager', 'prefix' => 'contentmanager'], function () {
            //announcements

            Route::get('announcements/changeStatus/{announcementId}/{status}', 'AnnouncementsController@changeStatus');
            Route::resource('announcements', 'AnnouncementsController');
            Route::resource('announcements', 'AnnouncementsController')->only(['index', 'show']);
            //events

            Route::post('/eventsubmit', 'EventController@store');
            Route::get('/event', 'EventController@event');
            Route::get('/eventedit/{eventId}', 'EventController@edit');
            Route::post('edit/eventedit/{eventId}', 'EventController@update');
            Route::get('event/changeStatus/{eventId}/{status}', 'EventController@changeStatus');

            Route::get('/logs', 'AuditLogController@index');

        });
        //---------------------------------------------------------------------------------
        Route::group(['middleware' => 'writer', 'prefix' => 'writer'], function () {
            //articles
            Route::resource('newsletter', 'NewsletterController');
            Route::post('articles/change', 'ArticleController@changeStatus');
            Route::resource('articles', 'ArticleController');
        });
        //---------------------------------------------------------------------------------
        Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
            Route::get('/changeStatus/{userId}/{status}', 'AdminsController@changeStatus');
            Route::resource('adminMaintenance', 'AdminsController')->only(['index', 'store']);
            Route::get('/memberchangeStatus/{userId}/{status}', 'AdminsController@changeStatus');
            Route::get('/members', 'MembersController@index');

        });
    });

    //forgotpassword
    Route::get('/forgotpassword', 'ForgotPasswordController@getKeys');
    Route::post('/forgotpassword/save', 'ForgotPasswordController@saveNewPassword');
    Route::resource('/forgotpassword', 'ForgotPasswordController')->except(['index', 'destroy', 'show', 'update']);

    //register
    Route::resource('register', 'RegisterController')->only(['store', 'index']);
    //logout
    Route::get('/logout', 'LoginController@logout');
    //login
    Route::resource('login', 'LoginController')->only(['index', 'store']);


});





