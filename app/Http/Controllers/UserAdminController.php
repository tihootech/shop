<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AdminDetail;
use App\Product;

class UserAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('master');
    }

    public function new_admin(Request $request)
    {
        $data = self::validation();
        $admin = User::make($data['name'], $data['phone'], $data['pwd'], 'admin');
        AdminDetail::make($admin->id, $data['title'], $data['address']);
        return redirect('admins/list')->withMessage('ادمین مورد نظر در سیستم تعریف شد.');
    }

    public function edit_admin($id)
    {
        $admin = User::findOrFail($id);
        return view('admins.edit', compact('admin'));
    }

    public function update_admin($id, Request $request)
    {
        $data = self::validation($id);
        $admin = User::findOrFail($id);
        $details = $admin->details;

        $admin->name = $data['name'];
        $admin->phone = $data['phone'];
        $admin->save();

        if (!$details) {
            AdminDetail::make($admin->id, $data['title'], $data['address']);
        }else {
            $details->title = $data['title'];
            $details->address = $data['address'];
            $details->save();
        }

        return redirect('admins/list')->withMessage('ادمین مورد نظر ویرایش شد.');
    }

    public function list_admins()
    {
        $admins = User::whereType('admin')->paginate(20);
        return view('admins.list', compact('admins'));
    }

    public function destroy_admin($user_id)
    {
        $admin = User::findOrFail($user_id);
        $admin->delete();
        Product::where('admin_id', $admin->id)->delete();
        return back()->withMessage('ادمین مورد نظر از سیستم حذف شد.');
    }

    public static function validation($id=0)
    {
        $required_or_nullable = $id ? 'nullable' : 'required';
        $details = AdminDetail::where('admin_id', $id)->first();
        $details_id = $details->id ?? 0;
        return request()->validate([
            'name' => 'required',
            'title' => 'required|unique:admin_details,title,'.$details_id ,
            'phone' => 'required|unique:users,phone,'.$id,
            'pwd' => $required_or_nullable.'|min:4',
            'address' => 'nullable',
        ]);
    }
}
