<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\PasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register',[ApiController::class,'register']);
Route::post('login',[ApiController::class,'login']);
Route::group(['middleware' =>'auth:sanctum'],function(){
Route::get('user',[ApiController::class,'user']);
Route::post('logout',[ApiController::class,'logout']);
Route::post('forget',[PasswordController::class,'forget']);
});
