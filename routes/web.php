<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return redirect()->route('store');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
// Route::get('/store', 'HomeController@store')->name('store');


Route::get('/products', 'ProductController@index')->name('product.index');
Route::get('/products/create', 'ProductController@create')->name('product.create');
Route::post('/products/store', 'ProductController@store')->name('product.store');

Route::get('/contactus', 'ContactUsController@contactus')->name('contactus');
Route::post('/contactus/store', 'ContactUsController@store')->name('contactus.store');
Route::get('/contactus/thank', 'ContactUsController@thank')->name('contactus.thank');

Route::delete('/products/{product}', 'ProductController@destroy')->name('product.remove');
Route::put('/products/{product}', 'ProductController@update')->name('product.update');
Route::get('/products/search', 'ProductController@search')->name('product.search');


Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('cart.add');
Route::get('/shopping/cart', 'ProductController@showCart')->name('cart.show');


Route::get('/checkout/{amount}', 'ProductController@checkout')->name('cart.checkout')->middleware('auth');

Route::post('/charge', 'ProductController@charge')->name('cart.charge');

Route::get('/orders', 'OrderController@index')->name('order.index');


// 商品討論區


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('posts', 'PostsController');
Auth::routes();
