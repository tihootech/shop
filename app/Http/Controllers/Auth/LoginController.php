<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;


    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public static function log_him_in($user)
    {
        \Auth::login($user);
    }

    public function admin_login()
    {
        if (auth()->check()) {
            return redirect('home');
        }else {
            return view('auth.login', ['admin_login' => true]);
        }
    }

    public function username()
    {
        return 'phone';
    }
}
