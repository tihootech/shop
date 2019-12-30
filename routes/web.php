<?php

Route::get('/', 'StoreController@main' );

// larael auth routes and users
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin-login', 'Auth\LoginController@admin_login');
Route::resource('users','UserController')->only(['show','update']);
Route::post('forgot_password', 'Auth\ResetPasswordController@forgot_password');
Route::get('password/reset', 'Auth\ResetPasswordController@reset_password_form');
Route::post('reset_password', 'Auth\ResetPasswordController@reset_password');
Route::post('user_admin', 'UserAdminController@new_admin');
Route::get('admins/{id}/edit', 'UserAdminController@edit_admin');
Route::put('user_admin/{id}', 'UserAdminController@update_admin');
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
Route::get('store/checkout','StoreController@checkout');
Route::post('store/checkout','StoreController@pay');
Route::post('store/login','StoreController@login');
Route::post('store/register','StoreController@register');
Route::get('product/{shop_name}/{product_name}', 'StoreController@single_product');
Route::get('{title}', 'StoreController@shop');
