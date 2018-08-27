<?php

namespace Logistic\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application access tokens.
     *
     * @return \Illuminate\Http\Response
     */
    public function access_token()
    {
        return view('passport.passport-personal-access-tokens');
    }

    /**
     * Show the application authorized clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function authorized_client()
    {
        return view('passport.passport-authorized-clients');
    }

    /**
     * Show the application clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function clients()
    {
        return view('passport.passport-clients');
    }
}
