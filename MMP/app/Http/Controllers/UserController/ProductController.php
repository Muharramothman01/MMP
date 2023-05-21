<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Model\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showProducts(){
        $userID = auth()->id();
        $NewCart = null;
        $ishere = DB::table('carts')->where('user_Id',$userID)->exists();
        if(!$ishere){
            $NewCart = DB::insert('insert into carts (user_Id) values (?)',[$userID]);
        }
        $products = Product::select('id','name','price','img')->orderBy('id','desc')->get();
        return view('products',compact('products','NewCart'));
    }

    public function searchProduct(Request $request){
        $query = $request->input('query');
        $products = product::select('name','price','img')->where('name','LIKE','%'.$query.'%')->get();
        return view('products',compact('products'));
    }
}
