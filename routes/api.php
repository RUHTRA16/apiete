<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/produtos', function (Request $request) {
    
    $dados = [
        'nome' => 'João',
        'idade' => '18'
    ];
    
    return response()->json($dados);
});
