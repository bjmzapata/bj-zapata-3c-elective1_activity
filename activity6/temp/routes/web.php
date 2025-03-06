<?php

use App\Http\Controllers\OrderContoller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/customer/{customer_id}/{name}/{address}',[OrderController::class,'customer']);
Route::get('/item/{item_no}/{name}/{price}',[OrderController::class,'item']);
Route::get('/order/{customer_id}/{name}/{order_no}/{date}',[OrderController::class,'order']);
Route::get('/orderdetails/{trans_no}/{order_no}/{item_id}/{name}/{price}/{qty}',[OrderController::class,'orderdetails']);
Route::get('/master',[OrderController::class,'master']);
