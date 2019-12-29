<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\PasswordReset;
use App\Http\Controllers\TextMessageController;
use App\Http\Controllers\Helper;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function forgot_password()
    {
        $phone = request('phone');

        // check if user exists
        $user = User::where('phone',$phone)->first();
        if (!$user) {
            return back()->withErrors(['کاربری با این شماره تماس یافت نشد']);
        }

        // check if recently user has changed his password
        $formatted_date = Carbon::now()->subHours(24)->toDateTimeString();
        $pass_reset = PasswordReset::where('phone',$phone)->where('used',1)->where('created_at','>=',$formatted_date)->first();
        if ($pass_reset) {
            return back()->withErrors(['شما طی 24 ساعت اخیر یک بار رمز عبور خود را تغییر داده اید. جهت امنیت بیشتر شما فعلا نمیتوانید بازیابی رمز عبور انجام دهید.']);
        }

        $formatted_date = Carbon::now()->subMinutes(2)->toDateTimeString();
        $pass_reset = PasswordReset::where('phone',$phone)->where('used',0)->where('created_at','>=',$formatted_date)->first();

        if (!$pass_reset) {

            \DB::table('password_resets')->where('phone',$phone)->where('used',0)->delete();

            $code = rs(6);
            PasswordReset::create(compact('phone','code'));
            $tokens = [$code, 'بازیابی-رمزعبور', url('/')];
            TextMessageController::lookup($phone,$tokens,'authenticating');
            $message = "کدی که به شماره $phone ارسال شده است را وارد کنید.";

        }

        return redirect('password/reset');

    }

    public function reset_password_form()
    {
        return view('auth.forgot');
    }

    public function reset_password()
    {

        request()->validate([
            'code' => 'required|exists:password_resets',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $code = request('code');
        $pass_reset = PasswordReset::where('code',$code)->where('used',0)->first();

        if ($pass_reset) {

            $user = User::where('phone', $pass_reset->phone)->first();
            if (!$user) {
                return back()->withErrors(['حساب کاربری این شخص پاک شده است']);
            }

            $user->password = bcrypt( request('password') );
            $user->save();

            $pass_reset->used = 1;
            $pass_reset->save();

            \Auth::login($user);
            Helper::message('رمز عبور شما تغییر یافت و شما با موفقیت وارد حساب کاربری خود شدید');
            return redirect('home');

        }else {
            return back()->withErrors(['چنین کدی یافت نشد.']);
        }

    }
}
