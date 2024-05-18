<?php

use App\Http\Controllers\api\EquipoController;
use App\Http\Controllers\api\ReservaController;
use App\Http\Controllers\api\ClienteController;
use App\Http\Controllers\api\ContratoController;
use App\Http\Controllers\api\PagoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para Equipos
Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
Route::get('/equipos/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');
Route::put('/equipos/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');
Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');

// Rutas para Reservas
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
Route::get('/reservas/{reserva}', [ReservaController::class, 'show'])->name('reservas.show');
Route::put('/reservas/{reserva}', [ReservaController::class, 'update'])->name('reservas.update');
Route::delete('/reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');

// Rutas para Clientes
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

// Rutas para Contratos
Route::post('/contratos', [ContratoController::class, 'store'])->name('contratos.store');
Route::get('/contratos', [ContratoController::class, 'index'])->name('contratos.index');
Route::get('/contratos/{contrato}', [ContratoController::class, 'show'])->name('contratos.show');
Route::put('/contratos/{contrato}', [ContratoController::class, 'update'])->name('contratos.update');
Route::delete('/contratos/{contrato}', [ContratoController::class, 'destroy'])->name('contratos.destroy');

// Rutas para Pagos
Route::post('/pagos', [PagoController::class, 'store'])->name('pagos.store');
Route::get('/pagos', [PagoController::class, 'index'])->name('pagos.index');
Route::get('/pagos/{pago}', [PagoController::class, 'show'])->name('pagos.show');
Route::put('/pagos/{pago}', [PagoController::class, 'update'])->name('pagos.update');
Route::delete('/pagos/{pago}', [PagoController::class, 'destroy'])->name('pagos.destroy');

