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

Route::get('/', 'PagesController@index')->name('home');
Route::get('/home', 'PagesController@home')->name('home');
Route::get('/category/{cat}', 'PagesController@categories')->name('categories');
Route::resource('categories', 'CategoriesController');
Route::get('/view/{temp_code}', 'PagesController@item');

Route::post('/upload','PostController@upload');

Route::get('/seller/loadinventory','PostController@loadinventory');   
Route::resource('/seller/inventory', 'PostController'); 
Route::resource('/order', 'OrdersController');
Route::resource('/seller/orders', 'SellerController');

Route::resource('/cart','CartController'); 
Route::get('/checkout','CartController@checkout');
Route::post('/checkout','CartController@checkout_order');
 
Route::resource('/super-admin', 'SuperAdminController');
Route::resource('/admin-center', 'AdminController');
Route::resource('/seller-center', 'SellerController');
