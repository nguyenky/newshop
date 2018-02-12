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
	
	Route::get('/','ProductsController@index');

	/*----------  CATEGORY  ----------*/

	Route::get("/{slug}-{id}",'CatsController@cats')->name('public.cats.cats');

	/*----------  BRANDS  ----------*/

	Route::get("/brands/{id}",'BrandsController@brands')->name('public.brands.brands');

	Route::get('test',function(){
		// dd('asdsd');
		// \Cart::add(455, 'Sample Item', 100.99, 2, array());
		$cartCollection = Cart::getContent();
		dd($cartCollection);
	})->name('test');
});

Route::group(['namespace'=>'Api','prefix' => 'api'],function(){
	Route::get('cart','ApiPublicController@getCart');
	

	// Route::get('test',function(){
	// 	// dd('asdsd');
	// 	// \Cart::add(455, 'Sample Item', 100.99, 2, array());
	// 	$cartCollection = Cart::getContent();
	// 	dd($cartCollection);
	// })->name('test');
});

Route::get('/public',function(){
	// return view('public.index');
	dd('ádsdsađâs');
});