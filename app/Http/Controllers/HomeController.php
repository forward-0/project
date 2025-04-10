<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)  {
        $products= Product::all();
        if (isset($request->search)) {
            $products = Product::where('product_name','LIKE','%'.$request->search.'%')->get();
        }
        $categories= Category::all();
        return view('index',compact('products' ,'categories'));
    }
    public function CategoryShow($id)  {

        $products = Product::where('category_id', $id)->get();

        $categories= Category::all();
        return view('index',compact('products' ,'categories'));
    }
}
