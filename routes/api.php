<?php

use App\Http\Controllers\ListNewsController;

use Illuminate\Support\Facades\Route;

Route::get('listnews', [ListNewsController::class, 'index']);
Route::get('listnews/{id}', [ListNewsController::class, 'showFullNews']);

Route::post('listnews', [ListNewsController::class, 'store']);
