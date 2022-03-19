<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;


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
Route::get('/', [PagesController::class,'home'])->name('home');

//inventory routes
Route::get('/inventory/create',[InventoryController::class,'create'])->middleware('login')->name('inventory.create');
Route::post('/inventory/create',[InventoryController::class,'createSubmit'])->middleware('login')->name('inventory.create');
Route::get('/inventory/list',[InventoryController::class,'list'])->middleware('login')->name('inventory.list');
Route::get('/inventory/edit/{id}',[InventoryController::class,'edit'])->middleware('login')->name('inventory.edit');
Route::post('/inventory/edit',[InventoryController::class,'editSubmit'])->middleware('login')->name('inventory.edit');
Route::get('/inventory/list/{id}',[InventoryController::class,'deletesubmit'])->middleware('login')->name('inventory.delete');

//customer registration routes
Route::get('/customer/create',[CustomerController::class,'create'])->middleware('login')->name('customer.create');
Route::post('/customer/create',[CustomerController::class,'createSubmit'])->middleware('login')->name('customer.create');

//customer login routes
//Route::get('/login',[LoginController::class,'login'])->name('login');
//Route::post('/login',[LoginController::class,'loginSubmit'])->name('login');

//customer dashboard routes
Route::get('/customer/list',[CustomerController::class,'list'])->name('products.list');
Route::get('/customer/dashboard',[CustomerController::class,'dashboard'])->middleware('login')->name('customer.dashboard');
Route::get('/customer/logout',[LoginController::class,'logout'])->middleware('login')->name('customer.logout');

//login routes
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginSubmit'])->name('login.submit');

//admin dashboard routes
Route::get('/admin/list',[InventoryController::class,'list'])->middleware('login')->name('inventory.list');
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->middleware('login')->name('admin.dashboard');
Route::get('/admin/logout',[LoginController::class,'logout'])->middleware('login')->name('admin.logout');

//cart routes
Route::get('/products/addtocart/{id}',[CartController::class,'addtocart'])->name('products.addtocart');
Route::get('/products/emptycart',[CartController::class,'emptycart'])->middleware('login')->name('products.emptycart');
Route::get('/products/viewcart',[CartController::class,'cart'])->middleware('login')->name('products.viewcart');
Route::get('/products/checkout',[CartController::class,'checkout'])->middleware('login')->name('products.checkout');
Route::post('/products/checkout',[CartController::class,'checkout'])->middleware('login')->name('products.checkout');
Route::get('/products/myorders',[CustomerController::class,'myorders'])->middleware('login')->name('products.myorders');
Route::get('/products/orderdetails/{id}',[CustomerController::class,'orderdetails'])->middleware('login')->name('products.orderdetails');