<?php

Route::get('/', 'StoreController@main' );

// larael auth routes and users
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users','UserController')->only(['show','update']);
Route::post('forgot_password', 'Auth\ResetPasswordController@forgot_password');
Route::get('password/reset', 'Auth\ResetPasswordController@reset_password_form');
Route::post('reset_password', 'Auth\ResetPasswordController@reset_password');
Route::post('new_admin', 'UserAdminController@new_admin');
Route::get('admins/list', 'UserAdminController@list_admins');
Route::delete('admins/{user_id}', 'UserAdminController@destroy_admin');

// ajax
Route::post('ajax/{method}', 'AjaxController@main');

// online store management
Route::resource('products','ProductController')->except(['show']);
Route::resource('orders','OrderController')->only(['show','index']);
Route::get('products/{product}/images', 'ProductController@edit_images');
Route::post('products/images/{product}', 'ProductController@store_images');
Route::delete('products/images/{image}', 'ProductController@delete_image');


// online store output
Route::get('shop','StoreController@shop');
Route::get('store/checkout','StoreController@checkout');
Route::post('store/checkout','StoreController@pay');
Route::post('store/login','StoreController@login');
Route::post('store/register','StoreController@register');
Route::get('{name}', 'StoreController@single_product');