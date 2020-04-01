<?php

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

Websocket::on('connect', "\App\Http\Controllers\SocketController@connect");

Websocket::on('disconnect', function ($websocket) {
    dump("User " . Auth::id() . " disconnected.");
});

Websocket::on('message', "\App\Http\Controllers\SocketController@message");
