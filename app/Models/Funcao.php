<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    use HasFactory;

    protected $table = 'funcoes';

    protected $fillable = [
        'funcao_nome',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'funcao_id';

    public function usuario()
    {
        return $this->hasMany(User::class, 'user_id', 'user_id');
    }
}
