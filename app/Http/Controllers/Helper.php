<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Helper extends Controller
{
    public static function message($body='',$status='success')
    {
        session()->flash('message', $body);
        session()->flash('status', $status);
    }

    public static function error($body='')
    {
        session()->flash('message', $body);
        session()->flash('status', 'danger');
    }

    public static function flash($success=true)
    {
      $message = $success ? 'ذخیره سازی با موفقیت انجام شد.' : 'ذخیره سازی با خطا مواجه شد.' ;
      $status  = $success ? 'success' : 'danger' ;
      session()->flash('message', $message);
      session()->flash('status', $status);
    }

    public static function flash_delete_message($success=true)
    {
      $message = $success ? 'آیتم مورد نظر با موفقیت پاک شد.' : 'متاسفانه حذف آیتم مورد نظر با خطا مواجه شد' ;
      $status  = $success ? 'success' : 'danger' ;
      session()->flash('message', $message);
      session()->flash('status', $status);
    }

    public static function check($object)
    {
        return master() || $object->admin_id == auth()->id();
    }

}
