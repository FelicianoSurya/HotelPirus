<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchasingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;

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

Route::get('/',[LoginController::class , 'viewIndex'])->name('loginPage');
Route::post('login',[LoginController::class , 'login'])->name('login');
Route::get('logout',[LoginController::class , 'logout'])->name('logout');


Route::get('home',[HomeController::class, 'viewIndex'])->name('home');

Route::get('inventory',[InventoryController::class, 'viewIndex'])->name('inventory');
Route::post('inventory/addInventory',[InventoryController::class, 'addInventory']);
Route::get('inventory/edit/{inventory_id}' , [InventoryController::class, 'editView'])->name('editInventory');
Route::post('inventory/edit/action' , [InventoryController::class, 'editInventory']);
Route::get('inventory/masuk', [InventoryController::class, 'viewPemasukan'])->name('viewPemasukan');
Route::get('inventory/getPemasukan/{transaksi_id}', [InventoryController::class, 'getDetailTransaksi']);
Route::post('inventory/purchasing/terima', [InventoryController::class, 'processTerima']);
Route::get('getCategory/{get_id}',[InventoryController::class, 'getCategory'])->name('getCategory');
Route::get('inventory/edit/getCategory/{get_id}',[InventoryController::class, 'getCategoryDetail'])->name('getCategoryDetail');

Route::get('category',[CategoryController::class, 'view'])->name('kategori');
Route::post('category/addCategory',[CategoryController::class, 'addCategory']);
Route::get('category/edit/{category_id}' , [CategoryController::class, 'editView'])->name('editCategory');
Route::post('category/edit/action' , [CategoryController::class, 'editCategory']);

Route::get('purchasing',[PurchasingController::class, 'viewIndex'])->name('purchasing');
Route::get('getInventory/{get_id}',[PurchasingController::class, 'getInventory'])->name('getInventory');
Route::post('purchasing/save' , [PurchasingController::class , 'save']);
Route::post('purchasing/paid' , [PurchasingController::class , 'paid']);

Route::get('supplier',[SupplierController::class, 'viewIndex'])->name('supplier');
Route::post('supplier/add', [SupplierController::class, 'addSupplier']);
Route::get('supplier/edit/{supplier_id}', [SupplierController::class, 'editView']);
Route::post('supplier/edit/action', [SupplierController::class, 'editSupplier']);
Route::get('supplier/delete/{supplier_id}', [SupplierController::class, 'deleteSupplier']);

Route::get('user/edit' , [LoginController::class , 'viewEdit'])->name('pageEdit');
Route::post('user/edit/action', [LoginController::class, 'editUser']);
Route::get('user/add/', [LoginController::class, 'viewAdd'])->name('pageAdd');
Route::post('user/add/action', [LoginController::class, 'addUser']);
