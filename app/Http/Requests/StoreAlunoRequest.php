<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAlunoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Erro de validação',
            'errors' => $validator->errors(),
        ], 422));
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email',
            'telefone' => 'nullable|string|max:20',
            'data_nascimento' => 'nullable|date',
        ];
    }
}
