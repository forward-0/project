<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\productController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login');
});
Route::get('/sign', function () {
    return view('sign');
});
Route::get('/index', function () {
    $products= DB::table('products')->get();
    $categories= DB::table('categories')->get();
    return view('index',compact('products' ,'categories'));
});




//category panel
Route::get('/panel/categories/index', [CategoryController::class, 'index']);
Route::post('/panel/categories/store', [CategoryController::class,'store'])->name('category.store');
Route::get('/panel/categories/edit/{category}', [categoryController::class,'edit'])->name('category.edit');
Route::post('/panel/categories/update/{category}', [categoryController::class, 'update'])->name('category.update');
Route::get('/panel/categories/delete/{category}', [categoryController::class,'delete'])->name('category.delete');

//end

//product panel
Route::get('/panel/products/index', function () {
    $products= DB::table('products')->get();
    $categories= DB::table('categories')->get();
    return view('panel.products.index',compact('products' ,'categories'));
});
Route::post('/panel/products/store', [productController::class,'store'])->name('product.store');
Route::get('/panel/products/delete/{id}', [productController::class,'delete'])->name('product.delete');
Route::get('/panel/products/edit/{id}', [productController::class,'edit'])->name('product.edit');
Route::post('/panel/products/update/{id}', [productController::class, 'update'])->name('product.update');
