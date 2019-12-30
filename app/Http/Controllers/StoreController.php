<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\OrderedProduct;
use App\User;
use App\AdminDetail;

class StoreController extends Controller
{

    public function main()
    {
        $no_search = null;
        $stores = User::whereType('admin')->latest()->get();
        return view('store.main', compact('no_search', 'stores'));
    }

    public function single_product($shop_name, $product_name)
    {
        $details = AdminDetail::where('title', $shop_name)->firstOrFail();
        $product = Product::where('admin_id', $details->admin_id)->where('name',$product_name)->firstOrFail();
        $shop_name = $product->admin->details->title ?? '';
        return view('store.single_product', compact('product', 'shop_name'));
    }

    public function shop($title, Request $request)
    {

        $admin_details = AdminDetail::whereTitle($title)->firstOrFail();
        $admin = $admin_details->admin;
        $shop_name = $admin_details->title ?? '';

        $products = Product::where('admin_id', $admin->id);
        if ($request->min && is_numeric($request->min)) {
            $products = $products->where('price', '>', $request->min);
        }
        if ($request->max && is_numeric($request->max)) {
            $products = $products->where('price', '<', $request->max);
        }
        if ($request->q) {
            $products = $products->where('name', 'like', "%$request->q%");
        }
        if ($request->order && in_array( $request->order, [
            'price-asc','date-asc', 'discount-asc',
            'price-desc','date-desc', 'discount-desc',
            ]))
        {
            $order = explode('-',$request->order);
            if ($order[0]=='date') {
                $order[0]='created_at';
            }
            $products = $products->orderBy($order[0],$order[1]);
        }
        $total_products = $products->count();
        $products = $products->paginate(12)->withPath(url()->full());

        return view('store.shop', compact('products', 'shop_name', 'total_products'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone'=>'required|exists:users,phone',
            'password'=>'required'
        ]);
        $user = User::where('phone',$request->phone)->first();
        if (\Hash::check($request->password, $user->password)) {
            LoginController::log_him_in($user);
            Helper::message('شما با موفقیت وارد حساب کاربری خود شدید');
            return back();
        }else {
            return back()->withErrors(['رمز عبور شما صحیح نیست.']);
        }
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|min:3|max:100|unique:users,name',
            'phone'=>'required|digits:11|unique:users,phone',
            'password'=>'required|string|min:4|max:100|confirmed'
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        LoginController::log_him_in($user);
        Helper::message('حساب کاربری شما با موفقیت ایجاد شد و وارد حساب کاربری خود شدید.');
        return back();
    }
}
