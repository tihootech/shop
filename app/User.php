<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'phone', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function update_phone($phone)
    {
        $this->phone = $phone;
        $this->save();
    }

    public static function make($name,$phone,$password,$type='regular')
    {
        $user = new self;
        $user->name = $name;
        $user->phone = $phone;
        $user->password = bcrypt($password);
        $user->type = $type;
        $user->save();
        return $user;
    }
}
