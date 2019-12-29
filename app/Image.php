<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = ['id'];
    
    public function owner()
    {
        return $this->morphTo();
    }
}
