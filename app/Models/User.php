<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'matricula',
        'data_nascimento',
        'data_admissao',
        'data_desligamento',
        'usuario_ativo',
        'telefone',
        'cpf',
    ];

    public static function criar($request){
        return self::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'matricula' => $request['matricula'],
            'data_nascimento' => $request['data_nascimento'],
            'data_admissao' => $request['data_admissao'],
            'data_desligamento' => $request['data_desligamento'],
            'telefone' => $request['telefone'],
            'cpf' => $request['cpf'],
            'password' => $request['password']
        ]);
    }

    protected $primaryKey = 'user_id';

    public function cargos() {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'cargo_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
