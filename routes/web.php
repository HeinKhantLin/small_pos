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

Auth::routes();

Route::get('/dashboard', 'HomeController@dashboard')->name('home');
Route::get('make_order','OrderController@order');
Route::get('make_order/getItems','OrderController@getItems');
Route::get('make_order/getSetMenu','OrderController@getSetMenu');
Route::get('make_order/itemList/{id}','OrderController@itemList');
Route::get('make_order/setMenuList/{id}','OrderController@setMenuList');
Route::post('make_order/store','OrderController@store');

Route::get('receipt/{id}','InvoiceController@receipt');
