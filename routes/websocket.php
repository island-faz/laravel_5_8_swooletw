<?php

//use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;

//use Auth;

/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/

//Route::group(['middleware' => ['web', 'auth']], function(){
Websocket::on('connect', "\App\Http\Controllers\SocketController@connect");//->middleware("auth");
//});

Websocket::on('disconnect', function ($websocket) {
    // called while socket on disconnect
});

Websocket::on('message', "\App\Http\Controllers\SocketController@message");

/**
Websocket::on('message', function ($websocket, $data) {
    dump($data . " From user: " . Auth::id());
    //$websocket->emit('message', $data);
});
**/