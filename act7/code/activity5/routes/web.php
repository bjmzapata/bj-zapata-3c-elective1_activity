<?php

use App\Http\Controllers\InformationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('profile-information',[InformationController::class,'showForm'])->name('profile-information');
Route::post('profile-information',[InformationController::class,'handleForm'])->name('profile-information');
