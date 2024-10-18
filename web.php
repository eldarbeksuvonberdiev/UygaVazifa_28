<?php

use App\Controllers\ProductController;
use App\Routes\Route;

Route::get('/', [ProductController::class, 'index']);
Route::get('/apiindex', [ProductController::class, 'withApi']);
Route::post('/delete', [ProductController::class, 'delete']);
Route::post('/addnew', [ProductController::class, 'newProduct']);
Route::post('/apiaddnew', [ProductController::class, 'ApinewProduct']);
