<?php

use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::get('/shop', 'ShopController@index');
Route::get('/shop/{product}', 'ShopController@show');
Route::get('/shop/category/{category}', 'ShopController@shopCategory');
Route::get('/cart/shop', 'ShopController@showCart');
Route::get('/profile/orders', 'OrderController@index');
Route::get('/profile/orders/{order}', 'OrderController@show');
Route::post('/shop/cart', 'ShopController@addToCart');
Route::patch('/shop/cart', 'ShopController@updateCart');
Route::delete('/shop/cart', 'ShopController@removeFromCart');
Route::get('/cart', 'ShopController@getCart');
Route::get('/checkout', 'ShopController@showCheckout');
Route::post('/checkout', 'ShopController@getCart');

Route::post('/payments/pay','PaymentController@pay')->name('pay');
Route::get('/payments/approval','PaymentController@approval')->name('approval');
Route::get('/payments/cancelled','PaymentController@cancelled')->name('cancelled');

Auth::routes();

