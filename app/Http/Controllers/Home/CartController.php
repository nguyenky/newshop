<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
class CartController extends Controller
{
    public function countCart(){

		$cart = Cart::count();

		if($cart == 0){
			return false;

		}

		return true;

    }
}
