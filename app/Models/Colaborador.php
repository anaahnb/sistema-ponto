<?php

namespace App\Models;

use App\Models\Cargo;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{

    protected $table = 'colaboradores';


    protected $fillable = [
        'cpf',
        'nome',
        'email',
        'data_nascimento',
        'data_admissao',
        'data_rescisao',
        'user_id',
        'cargo_id',
        'funcao_id',
        'horario_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'cargo_id');
    }

    public function funcao() {
        return $this->belongsTo(Funcao::class, 'funcao_id', 'funcao_id');
    }

    public function horarios() {
        return $this->hasMany(Horario::class, 'horario_id', 'horario_id');
    }
}
