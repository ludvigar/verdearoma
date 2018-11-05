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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as'=>'admin.', 'middleware'=>['auth','admin'], 'prefix'=>'admin'], function(){

	Route::get('/', 'AdminController@dashboard')->name('admin');

	Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
	
	Route::get('categories/trashed', 'CategoryController@trashed')->name('categories.trashed');
	Route::get('categories/{slug}/edit', 'CategoryController@edit')->name('categories.edit');
	Route::get('categories/{slug}/delete', 'CategoryController@delete')->name('categories.delete');
	Route::get('categories/{slug}/restore', 'CategoryController@restore')->name('categories.restore');
	Route::get('categories/{slug}/trash', 'CategoryController@trash')->name('categories.trash');

	Route::get('products/trashed', 'ProductController@trashed')->name('products.trashed');
	Route::get('products/{slug}/edit', 'ProductController@edit')->name('products.edit');
	Route::get('products/{slug}/delete', 'ProductController@delete')->name('products.delete');
	Route::get('products/{slug}/detail', 'ProductController@detail')->name('products.detail');
	Route::get('products/{slug}/restore', 'ProductController@restore')->name('products.restore');
	Route::get('products/{slug}/trash', 'ProductController@trash')->name('products.trash');
		
	Route::resource('categories', 'CategoryController');
	Route::resource('products', 'ProductController');
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
