<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresasController;

use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Cliente
Route::get('/empresas', [EmpresasController::class, 'search']);
Route::post('/empresas/login', [EmpresasController::class, 'login']);
Route::post('/empresas', [EmpresasController::class, 'store']);
Route::post('/empresas/{id}', [EmpresasController::class, 'update']);
Route::delete('/empresas/{id}', [EmpresasController::class, 'destroy']);


