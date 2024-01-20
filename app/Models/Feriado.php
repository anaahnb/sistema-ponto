<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feriado extends Model
{
    protected $table = 'feriados';

    protected $fillable = [
        'feriado_id',
        'feriado_descricao',
        'feriado_data',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'feriado_id';
}
