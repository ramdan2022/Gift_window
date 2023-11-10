<?php

use App\Http\Controllers\Apis\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\API_admin;

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

    route::prefix('admin')->group(function(){
      route::apiResource('/product',API_admin::class);
      route::get('/category_view',[API_admin::class,'category_view']);   
     });
   
});





 
// public route
Route::post('/register',[AuthController::class,'register']);
Route::Post('/Login',[AuthController::class,'Login']);