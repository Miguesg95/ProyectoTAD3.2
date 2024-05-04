<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;

Route::get('/', function () {
    return view('welcome');
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


