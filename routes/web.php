<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PagSeguroController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CartController::class, 'index']);
Route::get('/erro-pagamento', [CartController::class, 'purchaseError']);
