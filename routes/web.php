<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController:: class, "index"]);
Route::post('/listaReservas', [AuthController:: class, "login"])->name('login');

