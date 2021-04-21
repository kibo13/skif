<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\MaterialController;

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
    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('colors', ColorController::class)->except(['show']);
    Route::resource('materials', MaterialController::class)->except(['show']);


    Route::get('/', [HomeController::class, 'index'])->name('home');
});

