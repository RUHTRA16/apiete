<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/produto',ProdutoController::class);

Route::get('/teste', function (Request $request) {
    
    $dados = [
        'nome' => 'João',
        'idade' => '18'
    ];
    
    return response()->json($dados);
});
