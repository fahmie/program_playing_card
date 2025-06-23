<?php

use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CardController::class, 'index']);
Route::post('/distribute', [CardController::class, 'distribute'])->name('distribute');
