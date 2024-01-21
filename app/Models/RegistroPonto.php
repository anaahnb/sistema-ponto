<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroPonto extends Model
{
    use HasFactory;

    protected $table = 'registro_pontos';

    protected $fillable = [
        'turno',
        'registro_ponto_horario',
        'colaborador_id',
    ];

    protected $primaryKey = 'registro_ponto_id';

    public function colaborador(){
        return $this->belongsTo(Colaborador::class, 'colaborador_id', 'colaborador_id');
    }
}
