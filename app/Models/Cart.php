<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;
    
    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQuantity = $oldCart->totalQuantity;
        }
    }

    public function add($item, $id){
        $giohang = ['quantity'=>0, 'price'=>$item->price, 'item'=>$item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
            }
        }
        $giohang['quantity']++;
        if($item->price_promotion == 0){
        $giohang['price'] = $item->price * $giohang['quantity'];

        }
        else {
         $giohang['price'] = $item->price_promotion * $giohang['quantity'];

        }
        $this->items[$id] = $giohang;
        $this->totalQuantity++;
        if($item->price_promotion == 0){
        $this->totalPrice += $item->price;}
       else{
        $this->totalPrice += $item->price_promotion;
       }
        //    var_dump($giohang);exit;
        // var_dump($this->totalPrice);exit;
        
    }

    public function reduceByOne($id){
        $this->items[$id]['quantity']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQuantity --;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if($this->item[$id]['quantity'] <= 0){
            unset($this->items[$id]);
        }
    }

    public function removeItem($id){
        $this->totalQuantity -= $this->items[$id]['quantity'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }



}