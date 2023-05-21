<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Model\Credit;
use App\Model\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Model\Cart;
use Illuminate\Support\Facades\DB;
use Session;

class PaymentController extends Controller
{
    public function index(){
        //cart_products
        $user_id = auth()->id();
        $cartId = DB::table('carts')->select('id')->where('user_Id',$user_id)->get();
        $oldCart = Session::has('model\cart') ? Session::get('model\cart') :null;
        $cart = new Cart($oldCart);
        foreach($cart->items as $product){
            $insertData = DB::insert('insert into cart_products(cartID,productID,quantity) values (?,?,?)',[$cartId[0]->id,$product['item']['id'],$product['quantity']]);
        }
        //orders
        $insertOrder = DB::insert('insert into orders(cartID) values (?)',[$cartId[0]->id]);

        return view('payment.index',compact('insertData','insertOrder'));
    }

    public function credit(Request $request): \Illuminate\Http\RedirectResponse
    {
        $userId = auth()->id();
        $cartID = DB::table('carts')->select('id')->where('user_Id',$userId)->get();
        $orderID = DB::table('orders')->select('id')->where('cartID',$cartID[0]->id)->get();
        DB::table('credits')->insert([
            'name'=>$request->name,
            'orderID'=>$orderID[0]->id,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'card_number'=>$request->card_number
        ]);
        return redirect()->back()->with('success', 'Order Successfully Done');
    }
}
