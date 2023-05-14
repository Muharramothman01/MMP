<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Model\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showProducts(){
        $products=product::select('name','price','img')->orderBy('id','desc')->get();
        return view('products',compact('products'));
    }

    public function searchProduct(Request $request){
        $query = $request->input('query');
        $products = product::select('name','price','img')->where('name','LIKE','%'.$query.'%')->get();
        return view('products',compact('products'));
    }
}
