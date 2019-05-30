<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('orders/index', 'OrderController@index');
Route::get('orders/create', 'OrderController@create');
Route::get('orders/edit/{id}', 'OrderController@edit');
Route::put('orders/{id}', 'OrderController@update');
Route::get('orders/show/{id}', 'OrderController@show');
// Route::get('orders/destroy/{id}', 'OrderController@destroy');


Route::get('products', 'ProductController@index');
Route::get('products/create', 'ProductController@create');
Route::put('products/update', 'ProductController@update');
