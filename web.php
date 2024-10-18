<?php

use App\Controllers\ProductController;
use App\Routes\Route;

Route::get('/', [ProductController::class, 'index']);
