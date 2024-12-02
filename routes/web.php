<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\reservasController;

Route::get('/', [AuthController:: class, "index"])->name('inicio');

Route::post('/login', [AuthController:: class, "login"])->name('login');

Route::get('/home', [reservasController:: class, "index"])->name('index');

Route::post('/logout', [AuthController:: class, "logout"])->name('logout');

