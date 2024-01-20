<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';

    protected $fillable = [
        'cargo_nome',
        'user_id',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'cargo_id';

    public function usuario()
    {
        return $this->hasMany(User::class, 'user_id', 'user_id');
    }
}
