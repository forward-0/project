<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        if (isset( $request->search)) {
            $search= $request->search;
            $categories= Category::where('title','LIKE',$search)->get();

        }


        return view('panel.categories.index',compact('categories'));
    }

    public function store(Request $request){


        $request->validate([
            "title"=> "string|required",
            "image"=>"required|image"
            ]);



            $image = $request->file("image");
            $path =null;


            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('categories' , 'public');
            }

            Category::create([
                'title' => $request->title,
                'image'=> $path
            ]);
                return redirect('/panel/categories/index');
    }
            public function edit(Category $category){

                return view('panel.categories.edit',compact('category'));

            }
            public function update(Request $request ,Category $category ){
                $request->validate([

                    "title_edit"=> "string",
                    "image_edit"=> "image"

                    ]);




                $path =$category->image;


            if ($request->hasFile('image_edit')) {
                $image = $request->file("image_edit");
                if ($path) {
                                    Storage::disk('public')->delete($path);

                }
                $path = $request->file('image_edit')->store('categories' , 'public');
                     }

                    $category->update([
                        "title"=> $request->title_edit,
                        "image"=> $path,
                        ]);


                        return redirect('/panel/categories/index');
            }

    public function delete(Category $category){
        if ($category->image) {
           Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect('/panel/categories/index');

    }

}
