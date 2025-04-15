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
       $userId=Auth::user()->user_id;

       $cart = Cart::firstOrCreate(['user_id'=>$userId]);

       $cartItem= Cart_Item::firstOrCreate(['cart_id'=>$cart->cart_id,'product_id'=>$product->product_id],
       ['quantity'=>0]);

       $cartItem->increment('quantity');
       return redirect('order_list');
    }
    public function delete(Cart_Item $item)  {

       if ($item->quantity >1) {
        $item->decrement('quantity');
       }else{
        $item->delete();
       }
       return redirect('order_list');
    }
    public function ListOrder(Product $product)  {
       $userId=Auth::user()->user_id;

       $cart = Cart::where('user_id', $userId)->first();

       if (!$cart) {
           // سبد خرید وجود ندارد
           return response()->json(['message' => 'شما سبد خریدی ندارید.']);
       } else {
           $listOrder = Cart_Item::where('cart_id',$cart->cart_id)->get();
           return view('list-orders',compact('listOrder'));
       }
    }

}
