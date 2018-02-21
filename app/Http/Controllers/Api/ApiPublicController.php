<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use App\Models\Brand;
class ApiPublicController extends BaseController
{
    public function getCart(){
        // \Cart::add(1, 'Sample Item', 100.99, 2, array());
    	$cartCollection = \Cart::getContent();
    	// dd(count($cartCollection->toArray()));
    	// $count = $cartCollection->count();
        $count = \Cart::getTotalQuantity();
    	// dd($count);
        // $brand = Brand::all();
        dd($cartCollection->toArray());
        // return $this->sendResponse($brand, 'Cart retrieved successfully');
    	if(!$count){
    		return $this->sendError('Cart not found');
    	}
		return $this->sendResponse($count, 'Cart retrieved successfully');
    }
}
