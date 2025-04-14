<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_Item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function storeView(Product $product)  {

        

        
        return view('product',compact('product' ));
    }
    public function store(Product $product)  {
        $cart=null;
        if (Cart::where('user_id',Auth::user()->user_id)->count()==0) {

            $cart= Cart::create([
                'user_id'=>Auth::user()->user_id
            ]);
            
        }else{
            $cart =Cart::where('user_id',Auth::user()->user_id);
        }
        if (Cart_Item::where(['product_id','cart_id'],[$product->product_id,$cart->cart_id])->count()==0) {
            Cart_Item::create([
                'cart_id'=>$cart->cart_id,
                'product_id'=>$product->product_id,
                'quantity'=>'0'
            ]);
        }
    }
    
}
