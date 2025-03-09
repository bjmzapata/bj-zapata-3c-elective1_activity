<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('insert', [StudentController::class, 'insertform']);
Route::post('create', [StudentController::class, 'insert']);

Route::get('view',[StudentController::class,'index']);

Route::get('update-records',[StudentController::class,'index']);
Route::get('update/{id}',[StudentController::class,'edit']);
Route::post('update/{id}',[StudentController::class,'update']);

Route::get('delete-records',[StudentController::class,'index']);
Route::get('delete/{id}',[StudentController::class,'destroy']);