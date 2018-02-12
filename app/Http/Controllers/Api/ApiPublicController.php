<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
class ApiPublicController extends BaseController
{
    public function getCart(){
    	$cartCollection = \Cart::getContent();
    	// dd($cartCollection);
    	$count = $cartCollection->count();
    	dd($count);
    	if(!$cartCollection){
    		return $this->sendError('Cart not found');
    	}
		return $this->sendResponse($cartCollection->toArray(), 'Cart retrieved successfully');
    }
}
