<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use  App\User;
use  App\Staff;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!Staff::where('id', Auth::user()->id)->exists()){
            return view('pages.register');
        }
        return view('home');
    }
}
