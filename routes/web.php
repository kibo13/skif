<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PlateController;
use App\Http\Controllers\FabricController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\DataController;

Auth::routes([
  'login' => true,
  'register' => false,
  'reset' => false,
  'verify' => false,
  'confirm' => false,
]);

Route::middleware(['auth'])->group(function () {

  // USERS
  Route::resource('users', UserController::class)->except(['show']);

  // WORKERS
  Route::resource('workers', WorkerController::class)->except(['show']);

  // POSITIONS
  Route::resource('positions', PositionController::class)->except(['show']);

  // CATEGORIES
  Route::resource('categories', CategoryController::class)->except(['show']);

  // CUSTOMERS
  Route::resource('customers', CustomerController::class)->except(['show']);

  // MATERIALS
  Route::get(
    'materials',
    [MaterialController::class, 'index']
  )->name('materials.index');
  Route::resource(
    'plates',
    PlateController::class
  )->except(['index', 'show']);
  Route::resource(
    'fabrics',
    FabricController::class
  )->except(['index', 'show']);

  // PRODUCTS
  Route::resource('products', ProductController::class)->except(['show']);
  Route::get('products/{product}/types', [TypeController::class, 'index'])->name('products.types');
  Route::get('products/{product}/types/create', [TypeController::class, 'create'])->name('products.types.create');
  Route::post('products/{product}/types', [TypeController::class, 'store'])->name('products.types.store');
  Route::get('products/{product}/types/{type}/edit', [TypeController::class, 'edit'])->name('products.types.edit');
  Route::put('products/{product}/types/{type}', [TypeController::class, 'update'])->name('products.types.update');
  Route::delete('products/{product}/types/{type}', [TypeController::class, 'destroy'])->name('products.types.destroy');

  // ORDERS
  Route::resource('orders', OrderController::class)->except(['show']);

  // HOME
  Route::get('/', [HomeController::class, 'index'])->name('home');

  // BASKET
  Route::get('basket', [BasketController::class, 'index'])->name('home.basket.index');
  Route::post('basket', [BasketController::class, 'create'])->name('home.basket.create');
  Route::post('basket/add/{type}', [BasketController::class, 'addItem'])->name('home.basket.add');
  Route::post('basket/del/{type}', [BasketController::class, 'delItem'])->name('home.basket.del');
  Route::get('basket/confirm', [BasketController::class, 'confirm'])->name('home.basket.confirm');
  Route::post('basket/customer', [BasketController::class, 'newCustomer'])->name('home.basket.customer');

  // JSON
  Route::get('data/products', [DataController::class, 'products']);
});
