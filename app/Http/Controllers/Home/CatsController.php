<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
class CatsController extends Controller
{
    public function cats($slug,$id){
    	$arrItems = Product::orderBy('id','DESC')->where('category_id','=',$id)->limit(12)->get();
    	return view("public.products_cat",[
    		"arrItems"=>$arrItems
    		]);
    }
}
