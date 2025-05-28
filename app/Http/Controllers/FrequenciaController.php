<?php

namespace App\Http\Controllers;

use App\Models\Frequencia;
use App\Models\Aluno;
use Illuminate\Http\Request;

class FrequenciaController extends Controller
{
    public function index(Aluno $aluno)
    {
        return response()->json($aluno->frequencias);
    }

    public function store(Request $request, Aluno $aluno)
    {
        $request->validate([
            'data' => 'required|date',
            'presente' => 'required|boolean',
        ]);

        $frequencia = $aluno->frequencias()->create($request->all());

        return response()->json($frequencia, 201);
    }

    public function update(Request $request, Frequencia $frequencia)
    {
        $request->validate([
            'data' => 'sometimes|required|date',
            'presente' => 'sometimes|required|boolean',
        ]);

        $frequencia->update($request->all());

        return response()->json($frequencia);
    }

    public function destroy(Frequencia $frequencia)
    {
        $frequencia->delete();

        return response()->json(['message' => 'Frequência deletada com sucesso']);
    }
}
