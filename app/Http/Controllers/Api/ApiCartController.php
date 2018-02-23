<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use Cart;
class ApiCartController extends BaseController
{
    public function countCart(){

		$cart = Cart::count();

		return $this->sendResponse($cart, 'Cart retrieved successfully');

    }
    public function addCart(Request $request){
    	$input = $request->all();

		Cart::add($input);

		return $this->sendResponse([], 'Successfully');

    }
    public function content(){

        $cart = Cart::content();

        return $this->sendResponse($cart, 'Cart retrieved successfully');
    }

    public function updateCart(Request $request){
        $input = $request->all();

        Cart::update($input['rowID'], $input);

        return $this->sendResponse([], 'Cart retrieved successfully');
    }
    public function remove(Request $request){
        $input = $request->all();

        Cart::remove($input['rowID']);

        return $this->sendResponse([], 'Cart retrieved successfully');
    }
}
