<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
class ProductsController extends Controller
{
    public function index(){
    	$arrItems = Product::orderBy('id','ASC')->limit(9)->get();
        return view("public.index",[
            'arrItems' => $arrItems->toArray(),
        ]);
    }
}
