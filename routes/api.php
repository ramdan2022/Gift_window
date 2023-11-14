<?php

use App\Http\Controllers\Apis\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\API_admin;
use App\Http\Controllers\Apis\APi_User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user',
 function (Request $request) {
    return $request->user();
});

// protected route
Route::middleware('auth:sanctum')-> group(function(){

   route::post('/Logout',[AuthController::class,'Logout']);

// admin controller
      route::prefix('admin')->group(function(){

      route::apiResource('/product',API_admin::class);
      route::get('/category_view',[API_admin::class,'category_view']);
      route::post('add_category',[API_admin::class,'add_category']);
      route::delete('/category_delete/{id}',[API_admin::class,'category_delete']);
      route::get('/show_order',[API_admin::class,'show_order']);
      route::put('order_delivered/{id}',[API_admin::class,'order_delivered']);
     });

//      user controller
   route::get('/product',[APi_User::class,'index']);
   route::get('/product_detail/{id}',[APi_User::class,'product_detail']);
});





 
// public route
Route::post('/register',[AuthController::class,'register']);
Route::Post('/Login',[AuthController::class,'Login']);