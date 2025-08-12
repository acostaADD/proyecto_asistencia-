<?php
use App\Http\Controllers\EmpleadosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresasController;

use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Empresas
Route::get('/empresas', [EmpresasController::class, 'search']);
Route::post('/empresas/login', [EmpresasController::class, 'login']);
Route::post('/empresas', [EmpresasController::class, 'store']);
Route::post('/empresas/{id}', [EmpresasController::class, 'update']);
Route::delete('/empresas/{id}', [EmpresasController::class, 'destroy']);

// Empleados
Route::get('/empleados', [EmpleadosController::class, 'search']);
Route::post('/empleados/login', [EmpleadosController::class, 'login']);
Route::post('/empleados', [EmpleadosController::class, 'store']);
Route::post('/empleados/{id}', [EmpleadosController::class, 'update']);
Route::delete('/empleados/{id}', [EmpleadosController::class, 'destroy']);
