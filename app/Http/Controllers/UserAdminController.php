<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('master');
    }

    public function new_admin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'pwd' => 'required|min:4',
        ]);
        User::make($request->name, $request->phone, $request->pwd, 'admin');
        return back()->withMessage('ادمین مورد نظر در سیستم تعریف شد.');
    }

    public function list_admins()
    {
        $admins = User::whereType('admin')->paginate(20);
        return view('admins.list', compact('admins'));
    }

    public function destroy_admin($user_id)
    {
        $admin = User::find($user_id);
        $admin->delete();
        return back()->withMessage('ادمین مورد نظر از سیستم حذف شد.');
    }
}
