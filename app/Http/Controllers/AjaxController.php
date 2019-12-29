<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AjaxController extends Controller
{
    public function main($method)
    {
        return $this->$method();
    }

    public function add_to_cart()
    {
        $cart_products = cart_products();
        $id = request('id');

        if ( isset($cart_products[$id]) ) {
            $cart_products[$id]['count']++;
        }else {
            $cart_products[$id]['product'] = Product::find($id);
            $cart_products[$id]['count'] = 1;
        }

        session(compact('cart_products'));
        return view('store.partials.basket');
    }

    public function remove_from_cart()
    {
        $cart_products = cart_products();
        $id = request('id');
        unset($cart_products[$id]);
        session(compact('cart_products'));
        return view('store.partials.basket');
    }

    public function change_cart_count()
    {
        $cart_products = cart_products();
        $id = request('id');
        $type = request('type');
        if ($type == 'more') {
            $cart_products[$id]['count']++;
        }elseif ( $cart_products[$id]['count'] > 1) {
            $cart_products[$id]['count']--;
        }
        session(compact('cart_products'));
        return view('store.partials.basket');
    }
}
