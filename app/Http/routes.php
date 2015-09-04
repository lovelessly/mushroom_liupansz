<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@getIndex');
Route::get('/track', 'IndexController@getTrack');
Route::get('/news', 'IndexController@getNews');
Route::get('/category', 'IndexController@getCategory');
Route::get('/productdetail', 'IndexController@getProductdetail');
Route::get('/ordermanage', 'IndexController@getOrdermanage');
Route::get('/cart', 'IndexController@getCart');
Route::get('/checkout', 'IndexController@getCheckout');
Route::get('/orderdispatch', 'IndexController@getOrderdispatch');
Route::get('/orderconfirm', 'IndexController@getOrderconfirm');
Route::get('/newsdetail', 'IndexController@getNewsdetail');

//Route::get('/home/test', 'HomeController@test');
//Route::controller('home', 'HomeController');
//Route::controller('auth', 'Auth\AuthController');

Route::controllers([
	'admin' => 'AdminController',
	'api' => 'ApiController',
	'file' => 'FileController',
]);
