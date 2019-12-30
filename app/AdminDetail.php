<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminDetail extends Model
{
    public static function make($admin_id, $title, $address)
    {
    	$ad = new self;
		$ad->admin_id = $admin_id;
		$ad->title = $title;
		$ad->address = $address;
		$ad->save();
		return $ad;
    }

    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
