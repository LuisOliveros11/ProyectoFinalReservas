<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\reservasController;

//************* RUTAS QUE OCUPAN PROTECCION *****
    //RUTA PARA PANTALLA DE HOME
    Route::get('/home', [reservasController:: class, "index"])->name('index');

    //RUTA PARA MANDAR DATOS LOGOUT
    Route::post('/logout', [AuthController:: class, "logout"])->name('logout');

    //RUTA PARA TRAER TODOS LOS USUARIOS
    Route::get('/panelUsuarios', [UsuarioController::class, 'getUsers'])->name('panelUsuario');


//******** RUTAS QUE NO OCUPAN PROTECCION ****


//RUTA PARA PANTALLA DE INICIO LOGIN
Route::get('/', function () {
    return view('login');
})->name('inicio');

//RUTA PARA MANDAR DATOS DE LOGIN
Route::post('/login', [AuthController:: class, "login"])->name('login');

//RUTA PARA PANTALLA DE AÑADIR USUARIO DESDE LOGIN
Route::get('/crearCuenta', function () {
    return view('register');
})->name('crearCuenta');

//RUTA PARA MANDAR DATOS DE CREAR CUENTA
Route::post('/añadirUsuario', [UsuarioController:: class, "addUser"])->name('añadirUsuario');




