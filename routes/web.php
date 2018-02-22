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

	// Route::get('test',function(){
	// 	dd('asdsd');
	// })->name('test');

	/*----------  BRANDS  ----------*/

	Route::get('/api/cart','CartController@countCart');
});

// Route::get('/test',function(){
// 	// \Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'options' => ['size' => 'large']]);
// 	dd(Cart::content());
// });