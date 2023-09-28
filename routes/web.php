<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminHome;
use Illuminate\Support\Facades\Auth;
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




Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



route::get('/redirect',[HomeController::class,'redirect'])->middleware(['auth','verified']);
route::get('/',[HomeController::class,'index']);

route::get('/category_view',[AdminHome::class,'category_view']);
route::post('/add_category',[AdminHome::class,'add_category']);
route::get('/category_delete/{id}',[AdminHome::class,'category_delete']);
route::get('/Add_product',[AdminHome::class,'Add_product']);
route::post('/AddProduct',[AdminHome::class,'AddProduct']);
route::get('show_product',[AdminHome::class,'show_product']);
route::delete('product_delete/{id}',[AdminHome::class,'product_delete']);
route::get('/edit_product/{id}',[AdminHome::class,'edit_product']);
route::put('update_product/{id}',[AdminHome::class,'update_product']);
route::get('show_orders',[AdminHome::class,'show_orders']);
route::get('deliverd/{id}',[AdminHome::class,'deliverd']);
route::get('email_inf/{id}',[AdminHome::class,'email_inf']);
route::post('send_email/{id}',[AdminHome::class,'send_email']);
route::get('/search',[AdminHome::class,'search']);




route::get('/Product_Details/{id}',[HomeController::class,'Product_Details']);
route::post('/Add_cart/{id}',[HomeController::class,'Add_cart']);
route::get('/show_cart/{id}',[HomeController::class,'show_cart']);
route::get('/del_item/{id}',[HomeController::class,'del_item']);
route::get('cash_deliver',[HomeController::class,'cash_deliver']);
route::get('stripe/{finalprise}',[HomeController::class,'stripe']);
route::post('stripe/{finalprise}',[HomeController::class,'stripePost'])->name('stripe.post');
