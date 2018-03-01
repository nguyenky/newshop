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

    public function checkInfo(Request $request){
        $input = $request->all();
        // dd($input);
        $carts = Cart::content();
        return view("public.checkout",[
            "infor"=>$input,
            "carts"=>$carts
            ]);
    }
    public function pay(Request $request){
        $input = $request->all();
        Cart::destroy();
        return view("public.thanks",[

            ]);
    }
}
