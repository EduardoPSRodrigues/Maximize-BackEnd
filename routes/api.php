<?php

use App\Http\Controllers\ListNewsController;

use Illuminate\Support\Facades\Route;

Route::post('listnews', [ListNewsController::class, 'store']);
Route::get('listnews', [ListNewsController::class, 'index']);
