<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\FabricController;
use App\Http\Controllers\ColorController;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BasketController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;

Auth::routes([
    'login' => true,
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::middleware(['auth'])->group(function () {

    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('workers', WorkerController::class)->except(['show']);
    Route::resource('positions', PositionController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('materials', MaterialController::class)->except(['show']);
    Route::resource('fabrics', FabricController::class)->except(['show']);
    Route::resource('colors', ColorController::class)->except(['show']);

    Route::resource('customers', CustomerController::class)->except(['show']);
    Route::resource('products', ProductController::class)->except(['show']);
    
    Route::resource('orders', OrderController::class)->except(['show']);
    // basket 
    Route::get('basket', [BasketController::class, 'index'])->name('basket.index');
    Route::post('basket/create/{id}', [BasketController::class, 'create'])->name('basket.create');
    Route::post('basket/add/{id}', [BasketController::class, 'addItem'])->name('basket.add.item');
    Route::post('basket/del/{id}', [BasketController::class, 'delItem'])->name('basket.del.item');

    // HOME 
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // JSON 
    Route::get('data/products', [DataController::class, 'products']);
});

