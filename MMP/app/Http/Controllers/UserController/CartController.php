<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Session;

class CartController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index()
    {
        if(!Session::has('model\cart')){
            return view('cart.index');
        }
        $oldCart = Session::get('model\cart');
        $cart = new Cart($oldCart);
        return view('cart.index',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function store(Request $request,$id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($id);
        $oldCart = Session::has('model\cart') ? Session::get('model\cart') :null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        $request -> session()->put('model\cart',$cart);
        return redirect()->back()->with('Item added to cart.');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function destroy(Request $request,$id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($id);
        $oldCart = Session::has('model\cart') ? Session::get('model\cart') :null;
        $cart = new Cart($oldCart);
        $cart->remove($product,$product->id);
        $request->session()->put('model\cart',$cart);
        return redirect()->back()->with('Item removed to cart.');
    }

}
