<?php

use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::prefix('wallet')->group(function () {
    Route::get('/assets/info', [WalletController::class, 'info']);
});

Route::get('/', function () {
    return view('welcome');
});
