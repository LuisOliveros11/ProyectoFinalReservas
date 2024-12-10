<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\reservasController;

//************* RUTAS QUE OCUPAN PROTECCION *****
Route::middleware([AuthMiddleware::class])->group(function(){
    //RUTA PARA PANTALLA DE HOME
    Route::get('/home', [reservasController:: class, "index"])->name('index');

    //RUTA PARA MANDAR DATOS LOGOUT
    Route::post('/logout', [AuthController:: class, "logout"])->name('logout');

    //RUTA PARA TRAER TODOS LOS USUARIOS
    Route::get('/panelUsuarios', [UsuarioController::class, 'getUsers'])->name('panelUsuario');

    //RUTA PARA EDITAR USUARIO
    Route::put('/editarUsuario', [UsuarioController:: class, "updateUser"])->name('editarUsuario');

    //RUTA PARA ELIMINAR USUARIO
    Route::delete('/eliminarUsuario', [UsuarioController:: class, "deleteUser"])->name('eliminarUsuario');

    
    //RUTA PARA TRAER TODOS LOS CLIENTES
    Route::get('/panelClientes', [ClienteController::class, 'getClients'])->name('panelClientes');

    //RUTA PARA TRAER DATOS ESPECIFICOS DE UN CLIENTE
    Route::get('/panelClienteEspecifico', [ClienteController::class, 'getClientByID'])->name('panelClienteEspecifico');

    //RUTA PARA CREAR CLIENTE
    Route::post('/añadirCliente', [ClienteController:: class, "addClient"])->name('añadirCliente');

    //RUTA PARA EDITAR CLIENTE
    Route::put('/editarCliente', [ClienteController:: class, "updateClient"])->name('editarCliente');
    
    //RUTA PARA ELIMINAR CLIENTE
    Route::delete('/eliminarCliente', [ClienteController:: class, "deleteClient"])->name('eliminarCliente');

    //RUTA PARA TRAER TODAS LAS MESAS
    Route::get('/panelMesas', [MesaController::class, 'getMesas'])->name('panelMesas');

    //RUTA PARA CREAR MESA
    Route::post('/añadirMesa', [MesaController:: class, "addMesa"])->name('añadirMesa');

    //RUTA PARA EDITAR MESA
    Route::put('/editarMesa', [MesaController:: class, "updateMesa"])->name('editarMesa');

    //RUTA PARA ELIMINAR MESA
    Route::delete('/eliminarMesa', [MesaController:: class, "deleteMesa"])->name('eliminarMesa');

    //RUTA PARA TRAER TODAS LAS RESERVAS
    Route::get('/panelReservas', [reservasController::class, 'getReservas'])->name('panelReservas');

    //RUTA PARA CREAR RESERVA
    Route::post('/añadirReserva', [reservasController:: class, "addReserva"])->name('añadirReserva');

    //RUTA PARA ELIMINAR RESERVA
    Route::delete('/eliminarReserva', [reservasController:: class, "deleteReserva"])->name('eliminarReserva');
});

//******** RUTAS QUE NO OCUPAN PROTECCION ****

//RUTA PARA PANTALLA DE INICIO LOGIN
Route::get('/', [AuthController:: class, "index"])->name('inicio');

//RUTA PARA MANDAR DATOS DE LOGIN
Route::post('/login', [AuthController:: class, "login"])->name('login');


//RUTA PARA PANTALLA DE AÑADIR USUARIO DESDE LOGIN
Route::get('/crearCuenta', function () {
    return view('register');
})->name('crearCuenta');

//RUTA PARA MANDAR DATOS DE CREAR CUENTA
Route::post('/añadirUsuario', [UsuarioController:: class, "addUser"])->name('añadirUsuario');




