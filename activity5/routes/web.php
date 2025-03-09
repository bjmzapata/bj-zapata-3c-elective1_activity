<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculateController; //ito ay para sa pag import ng CalculateController class para magamit sa route definitions.

Route::get('/', function () {
    return view('welcome');
});

//ito naman ay para sa pag route ng operation na gagamitin sa calculate function. 
Route::get('/{operation}/{num1}/{num2}', [CalculateController::class, 'calculate']);
