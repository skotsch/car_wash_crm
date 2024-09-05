<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RoomInventoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('clients', ClientController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('room_inventory', RoomInventoryController::class);
    Route::resource('transactions', TransactionController::class);
});
