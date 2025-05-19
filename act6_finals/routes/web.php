<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StudentController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', [NewsController::class, 'getNews']);





