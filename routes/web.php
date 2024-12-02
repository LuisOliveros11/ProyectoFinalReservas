<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\reservasController;

Route::get('/', [AuthController:: class, "index"]);

Route::post('/login', [AuthController:: class, "login"])->name('login');

Route::get('/listaReservas', [reservasController:: class, "index"])->name('index');

