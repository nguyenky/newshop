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

	Route::get("{slug}-{id}",'CatsController@cats')->name('public.cats.cats');
});

Route::get('/public',function(){
	// return view('public.index');
	dd('ádsdsađâs');
});