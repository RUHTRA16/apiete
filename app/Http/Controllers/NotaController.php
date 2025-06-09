<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Aluno;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    // ... (seus métodos index, update, destroy permanecem os mesmos) ...

    // Seu método store original (para POST /api/alunos/{aluno}/notas)
    public function store(Request $request, Aluno $aluno)
    {
        $request->validate([
            'disciplina' => 'required|string|max:255',
            'nota' => 'required|numeric|min:0|max:10',
            'descricao' => 'nullable|string|max:500',
        ]);

        $nota = $aluno->notas()->create($request->all());

        return response()->json($nota, 201);
    }

    // NOVO MÉTODO para lidar com POST /api/notas (se você adicionar essa rota)
    public function storeFromBody(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id', // Aqui o ID do aluno vem do corpo
            'disciplina' => 'required|string|max:255',
            'nota' => 'required|numeric|min:0|max:10',
            'descricao' => 'nullable|string|max:500',
        ]);

        $nota = Nota::create([
            'aluno_id' => $request->aluno_id,
            'disciplina' => $request->disciplina,
            'nota' => $request->nota,
            'descricao' => $request->descricao,
        ]);

        return response()->json($nota, 201);
    }
}