<?php

namespace App\Model;

class Cart{
    public $items = null;
    public $totalQty = 0;
    public  $totalPrice = 0;



    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['quantity'=>0,'price'=>$item->price,'item'=>$item];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['quantity']++;
        $storedItem['price'] = $item->price * $storedItem['quantity'];
        $this->items[$id]=$storedItem;
        $this->totalQty++;
        $this->totalPrice +=$item->price;
    }

    public function remove($item,$id)
    {
        $storedItem = ['quantity'=>0,'price'=>$item->price,'item'=>$item];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
            }
        }

        if($storedItem['quantity'] > 1) {
            $storedItem['quantity']--;
            $storedItem['price'] = $item->price * $storedItem['quantity'];
            $this->items[$id] = $storedItem;
            $this->totalQty--;
            $this->totalPrice -= $item->price;
        }
        else{
            $this->totalQty--;
            $this->totalPrice -= $item->price;
            unset($this->items[$id]);

        }
    }

    public function addProducts($item,$ids){


    }
}
