<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function similar_products()
    {
        return self::where('id', '<>', $this->id)->inRandomOrder()->take(6)->get();
    }

    public function admin()
    {
        return $this->belongsTo(User::class);
    }

    public function cost()
    {
        return $this->discount ? ( $this->price - floor($this->price * $this->discount / 100) ) : $this->price;
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'owner')->orderBy('created_at');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'owner')->orderBy('id');
    }

    public function last_image()
    {
        return $this->morphOne(Image::class, 'owner')->orderBy('id', 'DESC');
    }

    public static function latest($limit=6)
    {
        return self::orderBy('created_at')->take($limit)->get();
    }

    public static function hottest($limit=6)
    {
        return self::where('hot',1)->take($limit)->get();
    }
}
