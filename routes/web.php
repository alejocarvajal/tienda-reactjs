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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
/*
//Client routes
Route::get('/login', 'Client\ClientController@index')->name('login');
Route::post('/login', 'Client\ClientController@login')->name('login');
Route::get('/logout', 'Client\ClientController@logout')->name('logout');
Route::get('/register', 'Client\ClientController@register')->name('register');
Route::post('/register', 'Client\ClientController@save')->name('register');*/

//Payment Method routes
Route::get('/registerPaymentMethod', 'PaymentMethod\PaymentMethodController@register')->name('registerPaymentMethod');
Route::post('/registerPaymentMethod', 'PaymentMethod\PaymentMethodController@save')->name('registerPaymentMethod');

//Cart routes
Route::get('/cart', 'Cart\CartController@index')->name('cart');
Route::post('/saveCart', 'Cart\CartController@save')->name('saveCart');

//buyState routes
Route::get('/buyState', 'buyState\BuyStateController@index')->name('buyState');
Route::post('/buyState/getState', 'buyState\BuyStateController@getState')->name('getState');
