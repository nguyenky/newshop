<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
class BrandsController extends Controller
{
    public function brands($id){
    	$arrItems = Product::orderBy('id','DESC')->where('brand_id','=',$id)->limit(12)->get();
    	// dd($arrItems->toArray());
    	return view("public.products_brand",[
    		"arrItems"=>$arrItems
    		]);
    }
}
