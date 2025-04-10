<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    public function index(Request $request) {
        $products= Product::all();
        if (isset( $request->search)) {
            $search= $request->search;
            $products= Product::where('product_name','LIKE',$search)->get();

        }

        $categories= Category::all();

        return view('panel.products.index',compact('products','categories' ));
    }
    public function store(Request $request){
        $request->validate([
            "title"=> "string|required",
            "product_detail"=> "string|required",
            "category"=> "required|",
            "qty"=> "required|",
            "price"=> "required|",
            "image"=>"required|image"


            ]);

            $path = $request->file('image')->store('products' , 'public');
            Product::create([
                "product_name"=> $request->title,
            "product_detail"=> $request->product_detail,
            "category_id"=> $request->category,
            "product_qty"=> $request->qty,
            "product_price"=> $request->price,
            "product_image"=>$path

                ]);
                return redirect('/panel/products/index');
    }
    public function delete(Product $product){
        Storage::disk('public')->delete($product->product_image);
        $product->delete();
        return redirect('/panel/products/index');


        }
        public function edit(Product $product){

            $categories= DB::table('categories')->get();
            return view('panel.products.edit',compact('product','categories'));
        }
        public function update(Request $request , Product $product){
            $request->validate([
                "title"=> "string|required",
            "product_detail"=> "string|required",
            "category"=> "required|",
            "qty"=> "required|",
            "price"=> "required|",


                ]);

                if($request->hasFile("image")){
                    Storage::disk('public')->delete($request->file('image'));
                $path = $request->file('image')->store('products','public');


                $product->update([
                    "product_name"=> $request->title,
            "product_detail"=> $request->product_detail,
            "category_id"=> $request->category,
            "product_qty"=> $request->qty,
            "product_price"=> $request->price,
            "product_image"=>$path
                    ]);
                }else{
                    $product->update([
                        "product_name"=> $request->title,
            "product_detail"=> $request->product_detail,
            "category_id"=> $request->category,
            "product_qty"=> $request->qty,
            "product_price"=> $request->price,

                        ]);
                        }
                    return redirect('/panel/products/index');
        }
}
