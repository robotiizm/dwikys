<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->group(function (){


    Route::get('/servers', 'ServersController@index');
    Route::post('/servers', 'ServersController@store');
    Route::get('/servers/{server}', 'ServersController@show');
    Route::patch('/servers/{server}', 'ServersController@update');
    Route::delete('/servers/{server}', 'ServersController@destroy');
    Route::get('/servers/logs/{server}', 'ServersController@serverLogs');


    Route::get('/getBotKey', 'NotificationsController@getBotKey');
    Route::get('/checkKey', 'NotificationsController@checkKey');
    Route::get('/generateNewBotKey', 'NotificationsController@generateNewBotKey');

    Route::post('logout','ServersController@logout');

});

