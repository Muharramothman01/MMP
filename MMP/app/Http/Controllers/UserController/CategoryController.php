<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Model\Categorie;
use App\Model\product;

class CategoryController extends Controller
{
    public function showIPhones(){
        $products = product::select('name','price','img')->where('category','iphone1')->get();
        return view('products',compact('products'));
    }

    public function showXiaomi(){
        $products = product::select('name','price','img')->where('category','xiaomi1')->get();
        return view('products',compact('products'));
    }

    public function showOppo(){
        $products = product::select('name','price','img')->where('category','oppo1')->get();
        return view('products',compact('products'));
    }

    public function showPixel(){
        $products = product::select('name','price','img')->where('category','pixel1')->get();
        return view('products',compact('products'));
    }

    public function showSamsung(){
        $products = product::select('name','price','img')->where('category','samsung1')->get();
        return view('products',compact('products'));
    }



}
