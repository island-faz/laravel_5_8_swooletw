<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SocketController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('web');
        //$this->middleware('session');
    }

    public function connect(Request $request)
    {
        dump("[SOCK] [laravel_session] [".$request->cookies->get('laravel_session') . "] - user_id: " . Auth::id());
        dump("[SOCK] [   xsrf Token  ] [".$request->cookies->get('XSRF-TOKEN') . "] - user_id: " . Auth::id());
        dump("---------------------------------------------------------------------------");
    }

    public function message(Request $request)
    {

    }
}
