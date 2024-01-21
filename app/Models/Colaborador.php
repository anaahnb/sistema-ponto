<?php

namespace App\Models;

use App\Models\Cargo;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{

    protected $table = 'colaboradores';


    protected $fillable = [
        'cargo_id',
        'funcao_id',
        'user_id',
        'colaborador_cpf',
        'colaborador_nome',
        'colaborador_email',
        'colaborador_data_nascimento',
        'colaborador_data_admissao',
        'colaborador_data_rescisao',
    ];

    protected $primaryKey = 'colaborador_id';

    public static function criarColaborador($request, $user_id)
    {

        return self::create([
            'cargo_id' => $request['cargo_id'],
            'funcao_id' => $request['funcao_id'],
            'user_id' => $user_id,
            'colaborador_cpf' => $request['colaborador_cpf'],
            'colaborador_nome' => $request['colaborador_nome'],
            'colaborador_email' => $request['colaborador_email'],
            'colaborador_data_admissao' => $request['colaborador_data_admissao'],
            'colaborador_data_nascimento' => $request['colaborador_data_nascimento'],
            'colaborador_data_rescisao' => $request['colaborador_data_rescisao'],
        ]);
    }

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
