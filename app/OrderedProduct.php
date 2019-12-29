<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    public static function make($order_id)
    {
        foreach (cart_products() as $id => $array) {

            $op = new self;

            $count = $array['count'];
            $product = $array['product'];
            $payable_amount = $count * $product->cost();

            $op->order_id = $order_id;
            $op->product_id = $id;
            $op->name = $product->name;
            $op->discount = $product->discount;
            $op->count = $count;
            $op->discount_amount = ($count * $product->price) - $payable_amount;
            $op->payable_amount = $payable_amount;

            $op->save();

        }
    }
}
