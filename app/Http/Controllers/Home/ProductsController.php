<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
class ProductsController extends Controller
{
    public function index(){
    	$arrItems = Product::orderBy('id','ASC')->limit(9)->get();
        return view("public.index",[
            'arrItems' => $arrItems->toArray(),
        ]);
    }
    public function cart(){
    	// dd('asd');
    	// $cart = Cart::content();
    	// dd($cart);
    	Cart::add([
		  ['id' => '293ad1', 'name' => 'Product 1', 'qty' => 1, 'price' => 10.00],
		  ['id' => '4832k1', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'options' => ['size' => 'large']]
		]);
		$cart = Cart::content();
    	dd($cart);
    }
}
