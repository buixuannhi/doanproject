<?php

namespace App\Models;


class Cart 
{
    public $items = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct(){
        $this->items = session('cart') ? session('cart') : [];    
        $this->totalPrice = $this->getTotalPrice();    
        $this->totalQuantity = $this->getTotalQuantity(); 
    }

    public function setItem($pro, $quantity){
        if(isset($this->items[$pro->id])){
            $this->items[$pro->id]['quantity'] += $quantity;
        }
        else{
            $item = [
                'id' => $pro->id, 
                'name' => $pro->name, 
                'image' => $pro->image, 
                'price' => $pro->salse_price > 0 ? $pro->salse_price : $pro->price,
                'quantity' => $quantity
             ];
             $this->items[$pro->id]=$item;
        }
         session(['cart' => $this->items]);
    }
    // removeItem
    public function removeItem($id){
        if(isset($this->items[$id])){
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]); 
    }
    // updateItem
    public function updateItem($id, $quantity){
        if(isset($this->items[$id])){
            $this->items[$id]['quantity'] = $quantity > 0 ? ceil($quantity) : 1;
        }
        session(['cart' => $this->items]); 
    }
    public function clear(){
       
        session()->forget('cart'); 
    }
    private function getTotalPrice(){
        $total = 0;
        foreach($this->items as $item){
            $total += $item['quantity'] * $item['price'];
        }
        return $total;
    }

    private function getTotalQuantity(){
        $total = 0;
        foreach($this->items as $item){
            $total += $item['quantity'];
        }
        return $total;
    }
}
