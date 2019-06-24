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

Route::get('/item', 'ItemController@index');
Route::get('/item/detail/{item_id}', 'ItemController@detail')->name('item.detail');

Auth::routes();

Route::get('/', function () { return redirect('/home'); });

Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function () { return redirect('/admin/home'); });
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
	Route::get('item', 'Admin\ItemController@index')->name('admin.item.index');
	Route::get('item/add', 'Admin\ItemController@showAddForm')->name('admin.item.add');
	Route::post('item/add', 'Admin\ItemController@add');
	Route::get('item/detail/{item_id}', 'Admin\ItemController@detail')->name('admin.item.detail');
});
