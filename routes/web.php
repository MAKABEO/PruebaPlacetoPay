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
});

Route::get('/shop', 'ShopController@index');
Route::get('/shop/{product}', 'ShopController@show');
Route::get('/shop/category/{category}', 'ShopController@shopCategory');
Route::post('/shop/cart', 'ProductsController@addToCart');
Route::patch('/shop/cart', 'ShopController@updateCart');
Route::delete('/shop/cart', 'ShopController@removeFromCart');

Auth::routes();

