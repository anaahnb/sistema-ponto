<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model {
    use HasFactory;

    protected $table = 'horarios';

    protected $fillable = [
        'colaborador_id',
        'dia',
        'turno',
        'horario_ponto',

    ];

    protected $primaryKey = 'horarios_id';

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class, 'colaborador_id', 'colaborador_id');
    }
}
