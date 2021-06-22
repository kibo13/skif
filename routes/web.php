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
use App\Http\Controllers\DealController;

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
  Route::group([
    'middleware' => 'permission:user_full'
  ], function () {
    Route::resource('users', UserController::class)->except(['show']);
  });

  Route::group([
    'middleware' => 'permission:user_read'
  ], function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
  });

  // WORKERS and POSITIONS
  Route::group([
    'middleware' => 'permission:emp_full'
  ], function () {
    Route::resource('workers', WorkerController::class)->except(['show']);
    Route::resource('positions', PositionController::class)->except(['show']);
  });

  Route::group([
    'middleware' => 'permission:emp_read'
  ], function () {
    Route::get('workers', [WorkerController::class, 'index'])->name('workers.index');
    Route::get('positions', [PositionController::class, 'index'])->name('positions.index');
  });

  // CUSTOMERS
  Route::group([
    'middleware' => 'permission:cust_full'
  ], function () {
    Route::resource('customers', CustomerController::class)->except(['show']);
  });

  Route::group([
    'middleware' => 'permission:cust_read'
  ], function () {
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
  });

  // SUPPLIERS
  Route::group([
    'middleware' => 'permission:sup_full'
  ], function () {
    Route::resource('suppliers', SupplierController::class)->except(['show']);
  });

  Route::group([
    'middleware' => 'permission:sup_read'
  ], function () {
    Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
  });

  // CATEGORIES
  Route::group([
    'middleware' => 'permission:cat_full'
  ], function () {
    Route::resource('categories', CategoryController::class)->except(['show']);
  });

  Route::group([
    'middleware' => 'permission:cat_read'
  ], function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
  });

  // MATERIALS and COLORS 
  Route::group([
    'middleware' => 'permission:mat_full'
  ], function () {
    Route::resource('materials', MaterialController::class)->except(['show']);
    Route::resource('colors', ColorController::class)->except(['show']);
  });

  Route::group([
    'middleware' => 'permission:mat_read'
  ], function () {
    Route::get('materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('colors', [ColorController::class, 'index'])->name('colors.index');
  });

  // PRODUCTS
  Route::group([
    'middleware' => 'permission:furn_full'
  ], function () {
    Route::resource('products', ProductController::class)->except(['show']);
    Route::get('products/{product}/tops/create', [TopController::class, 'create'])->name('products.tops.create');
    Route::post('products/{product}/tops', [TopController::class, 'store'])->name('products.tops.store');
    Route::get('products/{product}/tops/{top}/edit', [TopController::class, 'edit'])->name('products.tops.edit');
    Route::put('products/{product}/tops/{top}', [TopController::class, 'update'])->name('products.tops.update');
    Route::delete('products/{product}/tops/{top}', [TopController::class, 'destroy'])->name('products.tops.destroy');
  });

  Route::group([
    'middleware' => 'permission:furn_read'
  ], function () {
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/{product}/tops', [TopController::class, 'index'])->name('products.tops');
  });

  // MOVEMENTS
  Route::group([
    'middleware' => 'permission:store_full'
  ], function () {
    Route::resource('movements', MovementController::class)->except(['show']);
    Route::get('movements/{movement}/materials/create', [MomController::class, 'create'])->name('movements.moms.create');
    Route::post('movements/{movement}/materials', [MomController::class, 'store'])->name('movements.moms.store');
    Route::get('movements/{movement}/materials/{mom}/edit', [MomController::class, 'edit'])->name('movements.moms.edit');
    Route::put('movements/{movement}/materials/{mom}', [MomController::class, 'update'])->name('movements.moms.update');
    Route::delete('movements/{movement}/materials/{mom}', [MomController::class, 'destroy'])->name('movements.moms.destroy');
  });

  Route::group([
    'middleware' => 'permission:store_read'
  ], function () {
    Route::get('movements', [MovementController::class, 'index'])->name('movements.index');
    Route::get('movements/rests', [RestController::class, 'rests'])->name('movements.rests');
    Route::get('movements/{movement}/materials', [MomController::class, 'index'])->name('movements.moms');
    Route::get('movements/bill/{movement}', [ReportController::class, 'bill'])->name('movements.bill');
  });

  // STATEMENTS
  Route::group([
    'middleware' => 'permission:statement_full'
  ], function () {
    Route::resource('purchases', PurchaseController::class);
    Route::get('purchases/{purchase}/complete', [PurchaseController::class, 'complete'])->name('purchases.complete');
    Route::get('purchases/materials/create', [PomController::class, 'create'])->name('purchases.poms.create');
    Route::get('purchases/materials/clear/{pom}', [PomController::class, 'clear'])->name('purchases.poms.del');
  });

  Route::group([
    'middleware' => 'permission:statement_read'
  ], function () {
    Route::get('purchases', [PurchaseController::class, 'index'])->name('purchases.index');
    Route::get('purchases/{purchase}', [PurchaseController::class, 'show'])->name('purchases.show');
    Route::get('purchases/list/{purchase}', [ReportController::class, 'list'])->name('purchases.list');
  });

  // DEALS 
  Route::group([
    'middleware' => 'permission:buy_full'
  ], function () {
    Route::get('deals/{purchase}/edit', [DealController::class, 'edit'])->name('deals.edit');
    Route::put('deals/{purchase}', [DealController::class, 'update'])->name('deals.update');
    Route::get('deals/agree/{purchase}', [ReportController::class, 'agree'])->name('deals.agree');
    Route::get('deals/depo/{purchase}', [ReportController::class, 'supDepo'])->name('deals.depo');
    Route::get('deals/debt/{purchase}', [ReportController::class, 'supDebt'])->name('deals.debt');
  });

  Route::group([
    'middleware' => 'permission:buy_read'
  ], function () {
    Route::get('deals', [DealController::class, 'index'])->name('deals.index');
  });

  // ORDERS and BASKET 
  Route::group([
    'middleware' => 'permission:order_full'
  ], function () {
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
    Route::get('basket', [BasketController::class, 'index'])->name('home.basket.index');
    Route::post('basket', [BasketController::class, 'create'])->name('home.basket.create');
    Route::post('basket/add/{top}', [BasketController::class, 'addItem'])->name('home.basket.add');
    Route::post('basket/del/{top}', [BasketController::class, 'delItem'])->name('home.basket.del');
  });

  Route::group([
    'middleware' => 'permission:order_read'
  ], function () {
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
  });

  // HOME
  Route::group([
    'middleware' => 'permission:home'
  ], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
  });

  // REPO 
  Route::group([
    'middleware' => 'permission:repo'
  ], function () {
    Route::get('repo', [ReportController::class, 'index'])->name('repo.index');
    Route::get('repo/sales', [ReportController::class, 'sales'])->name('repo.sales');
    Route::get('repo/budget', [ReportController::class, 'budget'])->name('repo.budget');
  });

  // JSON
  Route::get('data/materials', [DataController::class, 'materials']);
});
