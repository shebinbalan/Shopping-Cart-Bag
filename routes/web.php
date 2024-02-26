<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[FrontendController::class,'index']);
Route::post('add_to_cart',[CartController::class,'addToCart']);
Route::get('cartlist',[CartController::class,'cartList']);
Route::delete('/removecart/{id}', [CartController::class, 'removeCart'])->name('cart.delete');
Route::put('/updatecart/{id}', [CartController::class,'updateCart'])->name('cart.update');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/home', [App\Http\Controllers\Admin\FrontendController::class,'index']);
    


    Route::get('/product', [App\Http\Controllers\Admin\ProductController::class,'index']);
    Route::get('/add-product', [App\Http\Controllers\Admin\ProductController::class,'add']);
    Route::post('/insert-product', [App\Http\Controllers\Admin\ProductController::class,'insert']);
    Route::get('/ edit-product/{id}', [App\Http\Controllers\Admin\ProductController::class,'edit']);
    Route::put('/update-product/{id}', [App\Http\Controllers\Admin\ProductController::class,'update']);
    Route::get('/delete-product/{id}', [App\Http\Controllers\Admin\ProductController::class,'destroy']);

    
 });
