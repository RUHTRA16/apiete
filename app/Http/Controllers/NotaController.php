<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Aluno;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index(Aluno $aluno)
    {
        return response()->json($aluno->notas);
    }

    public function store(Request $request, Aluno $aluno)
    {
        $request->validate([
            'disciplina' => 'required|string|max:255',
            'nota' => 'required|numeric|min:0|max:10',
            'descricao' => 'nullable|string',
        ]);

        $nota = $aluno->notas()->create($request->all());

        return response()->json($nota, 201);
    }

    public function update(Request $request, Nota $nota)
    {
        $request->validate([
            'disciplina' => 'sometimes|required|string|max:255',
            'nota' => 'sometimes|required|numeric|min:0|max:10',
            'descricao' => 'nullable|string',
        ]);

        $nota->update($request->all());

        return response()->json($nota);
    }

    public function destroy(Nota $nota)
    {
        $nota->delete();

        return response()->json(['message' => 'Nota deletada com sucesso']);
    }
}
