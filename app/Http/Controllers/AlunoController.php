<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Http\Requests\StoreAlunoRequest;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        return response()->json(Aluno::all());
    }

    public function store(StoreAlunoRequest $request)
    {
        $aluno = Aluno::create($request->validated());
        return response()->json($aluno, 201);
    }

    public function show($id)
    {
        $aluno = Aluno::find($id);
        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado'], 404);
        }
        return response()->json($aluno);
    }

    public function update(StoreAlunoRequest $request, $id)
    {
        $aluno = Aluno::find($id);
        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado'], 404);
        }
        $aluno->update($request->validated());
        return response()->json($aluno);
    }

    public function destroy($id)
    {
        $aluno = Aluno::find($id);
        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado'], 404);
        }
        $aluno->delete();
        return response()->json(['message' => 'Aluno deletado com sucesso']);
    }
}
