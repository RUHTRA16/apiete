<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Produto::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request)
    {
        $dadosValidados = $request->validated();
        $produto = Produto::create($dadosValidados);

        return response()->json([
            'message' => 'Criado com sucesso',
            'data' => $produto,
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutoRequest $request, $id)
    {
        $data = $request->all();

        $produto = Produto::find($id);

        if(!$produto){
        return response()->json([
            'message' => 'produto não encontrado',
        ],Response::HTTP_NOT_FOUND);
        }

        $response = $produto->update($data);

        if(!$response){
            return response()->json([
            'message' => 'Erro ao atualizar produto',
        ],Response::HTTP_BAD_REQUEST);  
        }else{
              return response()->json([
            'message' => 'produto atualizado com sucesso',
        ],Response::HTTP_OK);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    
        $produto = Produto::findOrFail($id);


        if(!$produto){
        return response()->json([
            'message' => 'produto não encontrado',
        ],Response::HTTP_NOT_FOUND);
        }

        $produto->delete();

         return response()->json([
            'message' => 'apagado com sucesso',
        ],Response::HTTP_OK);
    
    }
}
