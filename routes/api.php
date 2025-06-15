<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\FrequenciaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/registro', [UserController::class, 'registro']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);

    Route::apiResource('/produtos', ProdutoController::class);
    Route::middleware('auth:sanctum')->group(function () {
    
});

    Route::apiResource('/alunos', AlunoController::class);

    Route::post('/notas', [NotaController::class, 'storeFromBody']);

    Route::apiResource('alunos.notas', NotaController::class)->shallow();
    Route::apiResource('alunos.frequencias', FrequenciaController::class)->shallow();
});
