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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['namespace'=>'Home'],function(){
	/*----------  PRODUCT  ----------*/
	
	Route::get('/','ProductsController@index')->name('public.index');

	/*----------  CATEGORY  ----------*/

	Route::get("/{slug}-{id}",'CatsController@cats')->name('public.cats.cats');

	/*----------  BRANDS  ----------*/

	Route::get("/brands/{id}",'BrandsController@brands')->name('public.brands.brands');

	/*----------  CART  ----------*/

	Route::get("/cart",'CartController@cart')->name('public.cart.cart');


	Route::get('/check','CartController@checkInfo')->name('check');

	/*----------  AUTH  ----------*/

	Route::get("/login",'LoginController@login')->name('public.login.login');

	Route::post('/register','LoginController@register')->name('public.login.register');

	Route::post('/login','LoginController@postLogin')->name('public.login.login');

	Route::get('/logout','LoginController@logout')->name('public.login.logout');

});

Route::group(['namespace'=>'Api'],function(){


	/*----------  API  ----------*/

	Route::get('/api/cart','ApiCartController@countCart');

	Route::post('/api/addcart','ApiCartController@addCart');

	Route::get('/api/cart-content','ApiCartController@content');

	Route::post('/api/updatecart','ApiCartController@updateCart');

	Route::post('/api/remove','ApiCartController@remove');

	Route::get('/api/total','ApiCartController@total');
});