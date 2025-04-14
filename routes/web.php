<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\StoreController;
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



//Auth
Route::get('/login', [AuthController::class,'login']);
Route::post('/login/register', [AuthController::class,'loginRegister'])->name('login.register');
Route::get('/sign', [AuthController::class,'sign'])->name('sign.user');
Route::get('/logout', [AuthController::class,'logout'])->name('logout.user');
Route::post('/sign/register', [AuthController::class,'signRegister'])->name('sign.register');




//home
Route::get('/index', [HomeController::class,'index'])->name('home.index');
Route::get('/index/{id}', [HomeController::class,'CategoryShow'])->name('home.show.category');


//store
Route::get('/index/store/{product}', [StoreController::class,'storeView'])->name('store.view');

Route::get('/index/product/{product}/store', [StoreController::class,'store'])->name('store');

Route::middleware('auth.custom')->group(function () {
//panel
Route::get('/panel/index', function ()  {
        return view('panel/index');

});




//category panel
Route::get('/panel/categories/index', [CategoryController::class, 'index'])->name('category.index');
Route::post('/panel/categories/store', [CategoryController::class,'store'])->name('category.store');
Route::get('/panel/categories/edit/{category}', [categoryController::class,'edit'])->name('category.edit');
Route::post('/panel/categories/update/{category}', [categoryController::class, 'update'])->name('category.update');
Route::get('/panel/categories/delete/{category}', [categoryController::class,'delete'])->name('category.delete');

//end

//product panel
Route::get('/panel/products/index', [productController::class,'index'])->name('product.index');
Route::post('/panel/products/store', [productController::class,'store'])->name('product.store');
Route::get('/panel/products/delete/{product}', [productController::class,'delete'])->name('product.delete');
Route::get('/panel/products/edit/{product}', [productController::class,'edit'])->name('product.edit');
Route::post('/panel/products/update/{product}', [productController::class, 'update'])->name('product.update');
});