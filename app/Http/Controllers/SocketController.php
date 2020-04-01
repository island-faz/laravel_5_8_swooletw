<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;
use Auth;

class SocketController extends Controller
{
    public function __construct()
    {
    }

    public function connect(Request $request)
    {
        $userId = Auth::id();
        dump("[SOCK] [laravel_session] [".$request->cookies->get('laravel_session') . "] - user_id: " . $userId);
        dump("[SOCK] [   xsrf Token  ] [".$request->cookies->get('XSRF-TOKEN') . "] - user_id: " . $userId);
        dump("---------------------------------------------------------------------------");

        Websocket::loginUsingId($userId);

    }

    public function message(Request $request, $data)
    {
        dump("message received: " . $data . " From: " . Websocket::getUserId());
        Websocket::broadcast()->emit('message', $data);
    }

    public function disconnect()
    {
        dump("User " . Auth::id() . " disconnected.");
    }
}
