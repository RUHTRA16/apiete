<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\FrequenciaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::post('/registro', [UserController::class, 'registro']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);

    Route::apiResource('/produtos', ProdutoController::class);
    Route::apiResource('/alunos', AlunoController::class);

    // AQUI ESTÁ A MUDANÇA: Adicionando uma rota POST para /api/notas
    Route::post('/notas', [NotaController::class, 'storeFromBody']); // Novo método ou ajuste o store

    Route::apiResource('alunos.notas', NotaController::class)->shallow(); 

    Route::apiResource('alunos.frequencias', FrequenciaController::class)->shallow();
});