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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','GuestController@home') //pagina home->lista clienti
->name('homepage');

// CUSTOMER ROUTES
Route::get('/customer/{id}','GuestController@customer') //pagina personale cliente,lista ordini e link a prodotti
->name('customer');

Route::get('/create/customer','GuestController@customerCreate')
->name('customerCreate');
Route::post('/store/customer','GuestController@customerStore')
->name('customerStore');

Route::get('/edit/customer/{id}','GuestController@customerEdit')
->name('customerEdit');
Route::post('/update/customer/{id}','GuestController@customerUpdate')
->name('customerUpdate');

Route::get('/delete/customer/{id}','GuestController@customerDelete')
->name('customerDelete');

// ORDER ROUTES
Route::get('order/{id}','GuestController@order')
->name('order');

Route::get('order/create/{id}','GuestController@orderCreate')
->name('orderCreate');
Route::post('order/store/{id}','GuestController@orderStore')
->name('orderStore');

Route::get('order/{orderId}/delete/{productId}', 'GuestController@orderProductDelete')
->name('orderProductDelete');

Route::get('order/edit/{id}','GuestController@orderEdit')
->name('orderEdit');


//PRODUCT ROUTES
Route::get('/product/{id}','GuestController@product') //scheda prodotto
->name('product');
