<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/adminPanel', AdminsController::class)-> name('adminPanel.go');

Route::post('/adminPanel/Calzado', [ AdminsController::class, 'crearCalzado' ]) -> name('calzadoAdmin.crear');
Route::delete('/adminPanel/Calzado/{id}', [ AdminsController::class, 'eliminarCalzado' ]) -> name('calzadoAdmin.eliminar');
Route::put('/adminPanel/Calzado/{id}', [ AdminsController::class, 'actualizarCalzado' ]) -> name('calzadoAdmin.actualizar');

Route::post('/adminPanel/User', [ AdminsController::class, 'crearUser' ]) -> name('userAdmin.crear');
Route::delete('/adminPanel/User/{id}', [ AdminsController::class, 'eliminarUser' ]) -> name('userAdmin.eliminar');
Route::put('/adminPanel/User/{id}', [ AdminsController::class, 'actualizarUser' ]) -> name('userAdmin.actualizar');

Route::post('/adminPanel/Venta', [ AdminsController::class, 'crearVenta' ]) -> name('ventaAdmin.crear');
Route::delete('/adminPanel/Venta/{id}', [ AdminsController::class, 'eliminarVenta' ]) -> name('ventaAdmin.eliminar');
Route::put('/adminPanel/Venta/{id}', [ AdminsController::class, 'actualizarVenta' ]) -> name('ventaAdmin.actualizar');