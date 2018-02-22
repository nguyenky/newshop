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
    	// $input['id'] = 123;
    	// $input['qty'] = 1;
    	// $input['price'] = 12;
    	// $input['name'] = 12;

		Cart::add($input);

		return $this->sendResponse([], 'Successfully');

    }
}
