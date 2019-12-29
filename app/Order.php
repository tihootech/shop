<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(OrderedProduct::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(State::class, 'state');
    }

    public function translated_status()
    {
        switch ($this->status) {
            case 1: return 'پرداخت نشده'; break;
            case 2: return 'پرداخت شده'; break;
            case 3: return 'تحویل به مامور پست'; break;
            case 4: return 'تحویل به مشتری'; break;
            default: return 'نامشخص'; break;
        }
    }
}
