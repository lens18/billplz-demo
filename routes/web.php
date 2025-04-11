<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PizzaOrderController;
use App\Http\Controllers\SnailClimbingController;


//password generator
Route::get('/password_generator', [App\Http\Controllers\PasswordController::class, 'password_generator']);
Route::post('/generate-password', [App\Http\Controllers\PasswordController::class, 'generate'])->name('generate.password');

//pizza ordering
Route::get('/pizza-order', [App\Http\Controllers\PizzaOrderController::class, 'order_pizza']);
Route::post('/pizza-order-bill', [App\Http\Controllers\PizzaOrderController::class, 'calculateBill'])->name('pizza.calculate');


//Snail climbing
// Route::get('/snail', [App\Http\Controllers\SnailClimbingController::class, 'snail-climb']);
Route::get('/snail', [App\Http\Controllers\SnailClimbingController::class, 'showForm'])->name('snail.form');
Route::post('/snail/calculate', [App\Http\Controllers\SnailClimbingController::class, 'calculateDays'])->name('snail.calculate');
