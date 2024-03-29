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

Route::get('/', function () { return redirect('/item'); });
Route::get('/item', 'ItemController@index')->name('item.index');
Route::get('/item/detail/{item_id}', 'ItemController@detail')->name('item.detail');

Route::group(['middleware' => 'auth:user'], function() {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/cart/{user_id}', 'CartController@index')->name('cart');
	Route::get('/cart/delete/{cart_id}', 'CartController@delete')->name('cart.delete');
	Route::get('/cart/add/{item_id}', 'CartController@add')->name('cart.add');
});

Route::group(['prefix' => 'admin'], function() {
	Route::get('/', function () { return redirect('/admin/item'); });
	Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\LoginController@login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
	Route::get('home', 'Admin\HomeController@index')->name('admin.home');
	Route::get('item', 'Admin\ItemController@index')->name('admin.item.index');
	Route::get('item/add', 'Admin\ItemController@showAddForm')->name('admin.item.add');
	Route::post('item/add', 'Admin\ItemController@add');
	Route::get('item/edit', 'Admin\ItemController@showEditForm')->name('admin.item.edit');
	Route::post('item/edit', 'Admin\ItemController@edit');
	Route::get('item/detail/{item_id}', 'Admin\ItemController@detail')->name('admin.item.detail');
});
