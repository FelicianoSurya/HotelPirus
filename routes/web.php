<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchasingController;
use App\Http\Controllers\SupplierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[LoginController::class , 'viewIndex'])->name('login');
Route::get('home',[HomeController::class, 'viewIndex'])->name('home');
Route::get('inventory',[InventoryController::class, 'viewIndex'])->name('inventory');
Route::get('purchasing',[PurchasingController::class, 'viewIndex'])->name('purchasing');
Route::get('supplier',[SupplierController::class, 'viewIndex'])->name('supplier');

Route::post('login' , [LoginController::class , 'login']);