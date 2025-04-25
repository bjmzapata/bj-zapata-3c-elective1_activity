<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('customers/add', [CustomerController::class, 'insertForm']);
Route::post('customers/insert', [CustomerController::class, 'insert']);
Route::get('customers/view', [CustomerController::class, 'index'])->name('customers.index');
Route::get('customers/details/{id}', [CustomerController::class, 'details']);
Route::get('customers/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('customers/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/delete/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('customers/add_product/{id}', [CustomerController::class, 'addProductForm']);
Route::post('customers/add_product/{id}', [CustomerController::class, 'storeProduct']);
Route::get('/orders', [CustomerController::class, 'showOrders'])->name('orders.index');
Route::get('customers/edit-product/{orderId}', [CustomerController::class, 'editProduct'])->name('customers.editProduct');
Route::post('customers/update-product/{orderId}', [CustomerController::class, 'updateProduct'])->name('customers.updateProduct');
Route::delete('customers/delete-product/{orderId}', [CustomerController::class, 'deleteProduct'])->name('customers.deleteProduct');
Route::get('customers/details/{id}', [CustomerController::class, 'details'])->name('customers.details');
Route::delete('customers/deleteProduct/{orderId}', [CustomerController::class, 'deleteProduct'])->name('customers.deleteProduct');
