<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\MomController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PomController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\DataController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ReportController;


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

  // CUSTOMERS
  Route::resource('customers', CustomerController::class)->except(['show']);

  // SUPPLIERS
  Route::resource('suppliers', SupplierController::class)->except(['show']);

  // CATEGORIES
  Route::resource('categories', CategoryController::class)->except(['show']);

  // MATERIALS
  Route::resource('materials', MaterialController::class)->except(['show']);

  // COLORS
  Route::resource('colors', ColorController::class)->except(['show']);

  // PRODUCTS
  Route::resource('products', ProductController::class)->except(['show']);
  Route::get('products/{product}/tops', [TopController::class, 'index'])->name('products.tops');
  Route::get('products/{product}/tops/create', [TopController::class, 'create'])->name('products.tops.create');
  Route::post('products/{product}/tops', [TopController::class, 'store'])->name('products.tops.store');
  Route::get('products/{product}/tops/{top}/edit', [TopController::class, 'edit'])->name('products.tops.edit');
  Route::put('products/{product}/tops/{top}', [TopController::class, 'update'])->name('products.tops.update');
  Route::delete('products/{product}/tops/{top}', [TopController::class, 'destroy'])->name('products.tops.destroy');

  // MOVEMENTS
  Route::resource('movements', MovementController::class)->except(['show']);
  Route::get('movements/rests', [RestController::class, 'rests'])->name('movements.rests');
  Route::get('movements/{movement}/materials', [MomController::class, 'index'])->name('movements.moms');
  Route::get('movements/{movement}/materials/create', [MomController::class, 'create'])->name('movements.moms.create');
  Route::post('movements/{movement}/materials', [MomController::class, 'store'])->name('movements.moms.store');
  Route::get('movements/{movement}/materials/{mom}/edit', [MomController::class, 'edit'])->name('movements.moms.edit');
  Route::put('movements/{movement}/materials/{mom}', [MomController::class, 'update'])->name('movements.moms.update');
  Route::delete('movements/{movement}/materials/{mom}', [MomController::class, 'destroy'])->name('movements.moms.destroy');
  Route::get('movements/bill/{movement}', [ReportController::class, 'bill'])->name('movements.bill');

  // PURCHASES
  Route::resource('purchases', PurchaseController::class);
  Route::get('purchases/{purchase}/complete', [PurchaseController::class, 'complete'])->name('purchases.complete');
  Route::get('purchases/materials/create', [PomController::class, 'create'])->name('purchases.poms.create');
  Route::get('purchases/materials/clear/{pom}', [PomController::class, 'clear'])->name('purchases.poms.del');
  Route::get('purchases/list/{purchase}', [ReportController::class, 'list'])->name('purchases.list');

  // ORDERS
  Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
  Route::get('orders/confirm', [OrderController::class, 'create'])->name('home.orders.create');
  Route::put('orders/confirm/{order}', [OrderController::class, 'store'])->name('home.orders.store');
  Route::get('orders/{order}/details', [OrderController::class, 'edit'])->name('orders.details');
  Route::put('orders/{order}', [OrderController::class, 'update'])->name('orders.update');
  Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
  Route::get('orders/alert/{order}', [MailController::class, 'alert'])->name('orders.alert');
  Route::get('orders/depo/{order}', [ReportController::class, 'depo'])->name('orders.depo');
  Route::get('orders/debt/{order}', [ReportController::class, 'debt'])->name('orders.debt');
  Route::get('orders/term/{order}', [ReportController::class, 'term'])->name('orders.term');

  // HOME
  Route::get('/', [HomeController::class, 'index'])->name('home');

  // BASKET
  Route::get('basket', [BasketController::class, 'index'])->name('home.basket.index');
  Route::post('basket', [BasketController::class, 'create'])->name('home.basket.create');
  Route::post('basket/add/{top}', [BasketController::class, 'addItem'])->name('home.basket.add');
  Route::post('basket/del/{top}', [BasketController::class, 'delItem'])->name('home.basket.del');

  // JSON
  Route::get('data/materials', [DataController::class, 'materials']);
});
