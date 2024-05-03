<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/adminPanel', AdminsController::class);
