<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::group(['middleware' => ['auth']], function()
    {
        Route::get('user/profile', [
            'as' => 'show_profile',
            'uses' => 'UsersController@show_profile'
        ]);

        Route::post('user/profile/upload-photo', 'UsersController@upload_profile_photo');

        Route::get('/user/settings/', [
            'as' => 'user_settings',
            'uses' => 'UsersController@settings'
        ]);

        Route::get('/ticket/create', [
            'as' => 'create_ticket',
            'uses' => 'TicketsController@create'
        ]);

        Route::patch('/ticket/{id}', 'TicketsController@update')
            ->where('id', '[0-9]+');

        Route::post('/ticket/{id}', 'CommentsController@store')
            ->where('id', '[0-9]+');

        Route::get('/admin', [
            'as' => 'admin_area',
            'uses' => 'UsersController@admin'
        ]);

        Route::delete('/ticket/{id}', 'TicketsController@destroy')
            ->where('id', '[0-9]+');

    });

    Route::get('/home', 'HomeController@index');

    Route::get('/', [
        'as' => 'all_tickets',
        'uses' => 'TicketsController@all'
    ]);

    Route::get('/tickets', [
        'as' => 'all_tickets',
        'uses' => 'TicketsController@all'
    ]);

    Route::post('/tickets', 'TicketsController@store');

    Route::get('/ticket/{id}', [
        'as' => 'show_ticket',
        'uses' => 'TicketsController@show'
    ])->where('id', '[0-9]+');

    Route::get('/tickets/user/{id}', [
        'as' => 'tickets_by_user',
        'uses' => 'TicketsController@tickets_by_user'
    ])->where('id', '[0-9]+');

    Route::get('/tickets/backlog/{id}', [
        'as' => 'tickets_by_backlog',
        'uses' => 'TicketsController@tickets_by_backlog'
    ])->where('id', '[0-9]+');

    Route::get('/tickets/status/{status}', [
        'as' => 'tickets_by_status',
        'uses' => 'TicketsController@tickets_by_status'
    ])->where('status', '[A-Za-z]+');

    Route::get('/tickets/type/{type}', [
        'as' => 'tickets_by_type',
        'uses' => 'TicketsController@tickets_by_type'
    ])->where('type', '[A-Za-z]+');

    Route::get('/tickets/priority/{priority}', [
        'as' => 'tickets_by_priority',
        'uses' => 'TicketsController@tickets_by_priority'
    ])->where('priority', '[A-Za-z]+');

// Authentication routes
    Route::get('auth/login', [
        'as' => 'login_path',
        'uses' => 'Auth\AuthController@getLogin'
    ]);
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', [
        'as' => 'logout_path',
        'uses' => 'Auth\AuthController@getLogout'
    ]);

// Registration routes
    Route::get('auth/register', [
        'as' => 'register_path',
        'uses' => 'Auth\AuthController@getRegister'
    ]);

    Route::post('auth/register', 'Auth\AuthController@postRegister');
});



