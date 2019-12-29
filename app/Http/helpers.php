<?php

function display_link($string)
{
    $parsed = get_string_between($string, '[', ']');
    return $parsed ? url($parsed) : $string;
}

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function translate($word)
{
    switch ($word) {
        case 'admin': return 'ادمین'; break;
        case 'regular': return 'عادی'; break;
        case 'customer': return 'مشتری'; break;
        case 'bg_path': return 'تصویر پس زمینه'; break;
        case 'image_path': return 'تصویر'; break;
        case 'logo_path': return 'لوگو'; break;
        case 'header': return 'هدر'; break;
        case 'footer': return 'فوتر'; break;
        case 'section': return 'بخش'; break;
        case 'carousel': return 'اسلاید شو'; break;
        case 'pictures': return 'تصاویر'; break;
        case 'services': return 'خدمات'; break;
        case 'pictures2': return 'تصاویر نوع 2'; break;
        case 'hover_pictures': return 'تصاویر افکت دار'; break;
        case 'products': return 'محصولات'; break;
        case 'alert': return 'اطلاعیه'; break;
        case 'news': return 'اخبار'; break;
        case 'default': return 'پیشفرض'; break;
        case 'blog': return 'بلاگ'; break;
        case 'times': return 'تعدادی'; break;
        case 'kg': return 'کیلویی'; break;
        case 'gr': return 'گرمی'; break;
        case 'video': return 'ویدیو'; break;
        case 'testimontal': return 'نظرات'; break;
        case 'contactus': return 'ارتباط با ما'; break;
        default: return $word; break;
    }
}

function active($path)
{
    return request()->fullUrl() == url($path);
}

function expanded($array)
{
    $query = str_replace(request()->url(), '',request()->fullUrl());
    $path = request()->path();
    return in_array($path.$query,$array);
}


function in_storage($path)
{
    return strpos($path, 'storage') === 0;
}


function rs($length = 10) {
    $characters = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function toman($value)
{
    return number_format($value) . " تومان";
}

function coc($var)
{
    return $var ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>';
}

function ooc($var)
{
    return $var ? '<i class="fa fa-eye-slash text-warning"></i>' : '<i class="fa fa-eye text-primary"></i>';
}

function cart_products()
{
    return session('cart_products') ?? [];
}

function cart_products_count()
{
    $products = cart_products();
    $sum = 0;
    if (count($products)) {
        foreach ($products as $id => $array) {
            $sum += $array['count'];
        }
    }
    return $sum;
}

function cart_sum($key=null)
{
    $products = cart_products();
    $sum = 0;
    if (count($products)) {
        foreach ($products as $id => $array) {
            if ($key) {
                $sum += $array['product']->$key * $array['count'];
            }else {
                $sum += $array['product']->cost() * $array['count'];
            }
        }
    }
    return $sum;
}

function admin()
{
    return auth()->user() && auth()->user()->type == 'admin';
}

function contains_file($type)
{
    $fragment_list = fragment_list($type);
    $files = fragments_file_list();
    return count( array_intersect($fragment_list, $files) ) > 0;
}

function admin_phone()
{
    $user = App\User::where('type', 'admin')->where('id', auth()->id())->first();
    return $user ? $user->phone : null;
}

function check_for_duplicates_in_array($array) {
   return count($array) !== count(array_unique($array));
}

function short($str, $limit=100, $strip = false) {
    if (mb_strlen ($str) > $limit) {
        $str = mb_substr ($str, 0, $limit - 3);
        return (mb_substr ($str, 0, mb_strrpos ($str, ' ')).'...');
    }
    return trim($str);
}

function prepare_multiple($inputs, $objects=[], $files=[])
{
    $result = [];

    foreach ($inputs as $key => $array) {
        if(is_array($array) && count($array)){
            foreach ($array as $i => $value) {

                //check if any picture is uploaded
                if (in_array($key, $files)) {

                    // delete prev file
                    if (count($objects) && isset($objects[$i])) {
                        $prev_file = $objects[$i]->$key;
                        if (file_exists($prev_file) && in_storage($prev_file)) {
                            \File::delete($prev_file);
                        }
                    }

                    // upload new file
                    $new_file = $value;
                    $name = rs().'-'.$new_file->getClientOriginalName();
                    $relative_path = 'storage/admin_uploads/';
                    $new_file->move($relative_path,$name);
                    $value = $relative_path . $name;

                }

                // prepare to insert value in database
                $result[$i][$key] = $value;
                $result[$i]['created_at'] = Carbon\Carbon::now();
                $result[$i]['updated_at'] = Carbon\Carbon::now();
            }
        }
    }
    return $result;
}
