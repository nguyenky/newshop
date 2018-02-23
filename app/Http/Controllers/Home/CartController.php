<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
class CartController extends Controller
{
    public function cart(){

		$carts = Cart::content();
		// dd($carts->toArray());
		return view("public.cart",[
    		"carts"=>$carts
    		]);

    }
}
