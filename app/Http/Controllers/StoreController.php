<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\OrderedProduct;
use App\User;

class StoreController extends Controller
{

    public function main()
    {
        $latest = Product::latest();
        return view('store.main', compact('latest') );
    }

    public function single_product($name)
    {
        $product = Product::where('name',$name)->first();
        if(!$product) abort(404);
        return view('store.single_product', compact('product'));
    }

    public function shop($title, Request $request)
    {
        dd($title);
        $products = Product::query();
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

        return view('store.shop', compact('products','total_products'));
    }

    public function checkout()
    {
        $cities = \App\City::all();
        $states = \App\State::all();
        $products = cart_products();
        return view('store.checkout', compact('cities', 'states', 'products'));
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

    public function pay(Request $request)
    {
        if ($user_id = auth()->id()) {
            $data = $request->validate([
                'full_name' => 'required|string|min:5|max:100',
                'phone' => 'required|digits:11',
                'state' => 'required|exists:states,id',
                'postcode' => 'required|digits:10',
                'address' => 'required|string|min:10',
                'description' => 'nullable|string',
            ]);
            $data['user_id'] = $user_id;

            $order = Order::create($data);
            OrderedProduct::make($order->id);

            Helper::message('سفارش شما با موفقیت در سیستم ثبت شد.');

            session([ 'cart_products' => [] ]);
            return redirect('orders');

        }else {
            return back()->withErrors(['لطفا ابتدا وارد حساب کاربری خود شوید']);
        }
    }
}
