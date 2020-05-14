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

// Hello....

Route::get('/', function () {
    return view('welcome');
});

// Auth, Middleware, Profile User

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')
	->name('home');

Route::get('/profile/{id}', 'UserController@profile')
	->name('users.profile');

Route::post('/profile/update/{id}', 'UserController@update_profile')
	->name('users.update_profile');

// Routing User Page

Route::get('/users', 'UserController@index')
	->name('users.index');

Route::get('/users/add', 'UserController@create')
	->name('users.create');

Route::post('/users', 'UserController@store')
	->name('users.store');

Route::get('/users/edit/{id}', 'UserController@edit')
	->name('users.edit');

Route::post('/users/update/{id}', 'UserController@update')
	->name('users.update');

Route::get('/users/delete/{id}', 'UserController@destroy')
	->name('users.destroy');

Route::get('/users/detail/{id}', 'UserController@show')
	->name('users.show');

// Routing Category Page

Route::get('/category', 'CategoryController@index')
	->name('category.index');

Route::get('/category/add', 'CategoryController@create')
	->name('category.create');

Route::post('/category', 'CategoryController@store')
	->name('category.store');

Route::get('/category/edit/{id}', 'CategoryController@edit')
	->name('category.edit');

Route::post('/category/update/{id}', 'CategoryController@update')
	->name('category.update');

Route::get('/category/delete/{id}', 'CategoryController@destroy')
	->name('category.destroy');

// Route::get('/users/detail/{id}', 'UserController@show')
// 	->name('users.show');

// Routing Product Page

Route::get('/products', 'ProductController@index')
	->name('products.index');

Route::get('/products/detail/{id}', 'ProductController@show')
	->name('products.show');

Route::get('/products/add', 'ProductController@create')
	->name('products.create');

Route::post('/products', 'ProductController@store')
	->name('products.store');

Route::get('/products/edit/{id}', 'ProductController@edit')
	->name('products.edit');

Route::post('/products/update/{id}', 'ProductController@update')
	->name('products.update');

Route::get('/products/delete/{id}', 'ProductController@destroy')
	->name('products.destroy');

// Routing Order Page

Route::get('/order', 'OrderController@index')
	->name('order.index');

Route::post('simpan_detail', 'OrderController@simpan_detail')
	->name('simpan_detail');

Route::post('/order', 'OrderController@store')
	->name('order.store');

Route::get('/order/delete/{id}', 'OrderController@destroy')
	->name('order.destroy');

// Routing Report Page

Route::get('/report', 'ReportController@index')
	->name('report.index');

Route::get('/report/detail/{nomor_pesanan}', 'ReportController@show')
	->name('report.show');

// Route::get('/products/add', 'ProductController@create')
// 	->name('products.create');

// Route::post('/products', 'ProductController@store')
// 	->name('products.store');

// Route::get('/products/edit/{id}', 'ProductController@edit')
// 	->name('products.edit');

// Route::post('/products/update/{id}', 'ProductController@update')
// 	->name('products.update');

Route::get('/report/delete/{nomor_pesanan}', 'ReportController@destroy')
	->name('report.destroy');