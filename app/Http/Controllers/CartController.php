<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
class CartController extends Controller
{
    public function add($id, Cart $cart){
        $product = Product::find($id);
        $quantity = request('quantity',1);
        $cart->setItem($product, $quantity);
        return redirect()->route('cart.view');
    }


    public function remove($id, Cart $cart){
       
        $cart->removeItem($id);
        return redirect()->route('cart.view');
    }


    public function update($id, Cart $cart){
        $quantity = request('quantity',1);
        $cart->updateItem($id, $quantity);
        return redirect()->route('cart.view');
    }


    public function clear( Cart $cart){
       
        $cart->clear();
        return redirect()->route('cart.view');
    }
    public function view( Cart $cart){
       
        if($cart->totalQuantity > 0){
            return view('home.cart-view', compact('cart'));
        }
        return view('home.empty');
    }
}
