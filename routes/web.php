<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CarritosController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CalzadosController;
use App\Http\Controllers\UsersController;
use App\Models\Calzado;


Route::get('/', function () {
    $calzados = Calzado::all();
    return view("index", @compact("calzados"));
});

/* Rutas del Admin Panel */
Route::get('/adminPanel', AdminsController::class)-> name('adminPanel.go');

Route::post('/adminPanel/Calzado', [ AdminsController::class, 'crearCalzado' ]) -> name('calzadoAdmin.crear');
Route::delete('/adminPanel/Calzado/{id}', [ AdminsController::class, 'eliminarCalzado' ]) -> name('calzadoAdmin.eliminar');
Route::put('/adminPanel/Calzado/{id}', [ AdminsController::class, 'actualizarCalzado' ]) -> name('calzadoAdmin.actualizar');

Route::post('/adminPanel/User', [ AdminsController::class, 'crearUser' ]) -> name('userAdmin.crear');
Route::delete('/adminPanel/User/{id}', [ AdminsController::class, 'eliminarUser' ]) -> name('userAdmin.eliminar');
Route::put('/adminPanel/User/{id}', [ AdminsController::class, 'actualizarUser' ]) -> name('userAdmin.actualizar');

Route::post('/adminPanel/Rol', [ AdminsController::class, 'crearRol' ]) -> name('rolAdmin.crear');
Route::delete('/adminPanel/Rol/{id}', [ AdminsController::class, 'eliminarRol' ]) -> name('rolAdmin.eliminar');
Route::put('/adminPanel/Rol/{id}', [ AdminsController::class, 'actualizarRol' ]) -> name('rolAdmin.actualizar');

Route::post('/adminPanel/Venta', [ AdminsController::class, 'crearVenta' ]) -> name('ventaAdmin.crear');
Route::delete('/adminPanel/Venta/{id}', [ AdminsController::class, 'eliminarVenta' ]) -> name('ventaAdmin.eliminar');
Route::put('/adminPanel/Venta/{id}', [ AdminsController::class, 'actualizarVenta' ]) -> name('ventaAdmin.actualizar');

Route::post('/adminPanel/LineaDeVenta', [ AdminsController::class, 'crearLineaDeVenta' ]) -> name('lineaDeVentaAdmin.crear');
Route::get('/adminPanel/LineaDeVenta/{id}', [ AdminsController::class, 'eliminarLineaDeVenta' ]) -> name('lineaDeVentaAdmin.eliminar');

Route::post('/adminPanel/LineaDeCarrito', [ AdminsController::class, 'crearLineaDeCarrito' ]) -> name('lineaDeCarritoAdmin.crear');
Route::get('/adminPanel/LineaDeCarrito/{id}', [ AdminsController::class, 'eliminarLineaDeCarrito' ]) -> name('lineaDeCarritoAdmin.eliminar');
/* Rutas del Admin Panel */



/* Rutas del Carrito */
Route::get('/carrito', CarritosController::class)->name('carrito');
Route::post('/crear-venta', [CarritosController::class, 'crearVenta'])->name('crearVenta');

/* Rutas del Carrito */


/* Rutas del index y detalle */

Route::get('/index', IndexController::class)-> name('index.go');
Route::get('/calzado/{id}', [CalzadosController::class, 'detalle'])->name('calzado.detalle');
Route::post('/carrito/agregar/{id}', [CarritosController::class, 'agregarProductoAlCarrito'])->name('carrito.agregar');

/* Rutas del index y detalle */

/* Rutas del Area de Cliente */
Route::get('/areaCliente', UsersController::class)-> name('client.go');
/* Rutas del Area de Cliente */