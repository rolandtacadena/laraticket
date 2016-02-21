<?php

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

    // create authentication routes
    Route::auth();

    Route::group(['middleware' => ['auth']], function()
    {
        Route::get('/user/profile', 'UsersController@show_profile')
            ->name('show_profile');

        Route::post('/user/profile/upload-photo', 'UsersController@upload_profile_photo');

        Route::get('/user/settings/', 'UsersController@settings')
            ->name('user_settings');

        Route::get('/ticket/create', 'TicketsController@create')
            ->name('create_ticket');

        Route::patch('/ticket/{ticket}', 'TicketsController@update')
            ->where('id', '[0-9]+');

        Route::post('/ticket/{ticket}', 'CommentsController@store')
            ->where('id', '[0-9]+');

        Route::get('/admin', 'UsersController@admin')
            ->name('admin_area');

        Route::delete('/ticket/{ticket}', 'TicketsController@destroy')
            ->where('id', '[0-9]+');

    });

    Route::get('/', 'TicketsController@all')
        ->name('all_tickets');

    Route::get('/tickets', 'TicketsController@all')
        ->name('all_tickets');

    Route::post('/tickets', 'TicketsController@store');

    Route::get('/ticket/{ticket}', 'TicketsController@show')
        ->name('show_ticket')
        ->where('id', '[0-9]+');

    Route::get('/tickets/user/{user}', 'TicketsController@tickets_by_user')
        ->name('tickets_by_user')
        ->where('id', '[0-9]+');

    Route::get('/tickets/backlog/{backlog}', 'TicketsController@tickets_by_backlog')
        ->name('tickets_by_backlog')
        ->where('id', '[0-9]+');

    Route::get('/tickets/status/{status}', 'TicketsController@tickets_by_status')
        ->name('tickets_by_status')
        ->where('status', '[A-Za-z]+');

    Route::get('/tickets/type/{type}', 'TicketsController@tickets_by_type')
        ->name('tickets_by_type')
        ->where('type', '[A-Za-z]+');

    Route::get('/tickets/priority/{priority}', 'TicketsController@tickets_by_priority')
        ->name('tickets_by_priority')
        ->where('priority', '[A-Za-z]+');

});



