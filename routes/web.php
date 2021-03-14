<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes([
    'login' => true,
    'register' => true,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::middleware(['auth'])->group(function () {


    Route::get('/', [HomeController::class, 'index'])->name('home');
});

