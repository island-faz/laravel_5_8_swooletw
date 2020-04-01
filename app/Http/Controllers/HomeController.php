<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('web');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        dump("[HTTP] [laravel_session] [".$request->cookies->get('laravel_session') . "] - user_id: " . Auth::id());
        dump("[HTTP] [   xsrf Token  ] [".$request->cookies->get('XSRF-TOKEN') . "] - user_id: " . Auth::id());
        return view('home');
    }
}
