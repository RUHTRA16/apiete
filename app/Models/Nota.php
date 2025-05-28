<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = ['aluno_id', 'disciplina', 'nota', 'descricao'];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}

