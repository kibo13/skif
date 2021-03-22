<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PositionController;

Auth::routes([
    'login' => true,
    'register' => true,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::middleware(['auth'])->group(function () {

  
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('positions', PositionController::class)->except(['show']);


    Route::get('/', [HomeController::class, 'index'])->name('home');
});

