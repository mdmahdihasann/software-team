<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\ProductCartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.page.home');
// });
// frontent controller------->
Route::get('/',[FrontendController::class,'productCategory']);

//stripe payment
Route::get('/stripe/{totalprice}',[ProductCartController::class,'stripe'])->name('stripe');
Route::post('/stripe/{totalprice}',[ProductCartController::class,'stripePost'])->name('stripe.post');


// Product cart controller------------>

Route::get('/cart',[ProductCartController::class,'cart'])->name('product.cart');
Route::get('/addtocart/{id}',[ProductCartController::class,'addtocart'])->name('product.add.to.cart');
Route::post('/cart/update',[ProductCartController::class,'updateCart'])->name('product.cart.update');
Route::delete('/cart/delete',[ProductCartController::class,'deleteCart'])->name('product.cart.delete');





// Product cart controller------------>
// frontent controller------->


Auth::routes([
    'register'         => false,   //404 disabled
    'password.confirm' => false,   //404 disabled
    'password.email'   => false,   //404 disabled
    'password.request' => false,   //404 disabled
    'password.reset'   => false,   //404 disabled
    'password.update'  => false    //404 disabled
]);
// --------------Authentication-----------------//
Route::get('/signIn',[AuthController::class,'signIn'])->name('signin');
Route::get('/signUp',[AuthController::class,'signUpShow']); 
Route::post('/signUp',[AuthController::class,'signUpStore'])->name('signUp.sotre'); 

// Route::get('/app', [HomeController::class, 'index'])->name('app');


// category route------------>
Route::group(['prefix' => 'category'], function () {
    Route::get('/index', [CategoryController::class,'index'])->name('category.index');
    Route::get('/create', [CategoryController::class,'create'])->name('category.create');
    Route::post('/store', [CategoryController::class,'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
    Route::put('/update/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::delete('/delete/{id}', [CategoryController::class,'delete'])->name('category.delete');

});
// category route------------>

// product route------------>
Route::group(['prefix'=>'product'],function(){
    Route::get('/index',[ProductController::class,'index'])->name('product.index');
    Route::get('/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::delete('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
});
// product route------------>
