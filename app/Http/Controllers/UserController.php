<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {
        if(!admin() && $user->id != auth()->id()){
            abort(404);
        }else {
            return view('users.show', compact('user'));
        }
    }

    public function update(User $user, Request $request)
    {
        if ($user->id != auth()->id()) {
            return back();
        }
        if ($request->type == 'info') {

            $data = $request->validate([
                "name"=>"required|string|min:3|max:30|unique:users,name,$user->id",
                "phone"=>"required|digits:11|unique:users,phone,$user->id",
            ]);
            $user->update($data);
            Helper::flash();
            return back();

        }elseif ($request->type == 'password') {

            if(! \Hash::check($request->current_password, $user->password)){
                return back()->withErrors(["رمز عبور فعلی صحیح نیست"]);
            }
            $request->validate(["new_password"=>"required|string|min:5|max:50|confirmed"]);
            $user->password = bcrypt($request->new_password);
            $user->save();
            \Auth::logout();
            return redirect("login");

        }else {
            return back();
        }
    }
}
