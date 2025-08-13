<?php


use App\Http\Controllers\{
  EmpresasController,
  EmpleadosController,
  MarcacionController
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Empresas


Route::get('/empresas', [EmpresasController::class, 'index']);
Route::get('/empresas', [EmpresasController::class, 'search']);
Route::post('/empresas', [EmpresasController::class, 'store']);
Route::put('/empresas/{id}', [EmpresasController::class, 'update']);
Route::delete('/empresas/{id}', [EmpresasController::class, 'destroy']);
Route::post('/empresas/login', [EmpresasController::class, 'login']);

