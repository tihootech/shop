<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Header;
use App\Footer;
use App\Layout;

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
        $current_user = auth()->user();
        return view("dashboard.main.$current_user->type",compact('current_user'));
    }
}
