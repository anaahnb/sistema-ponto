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

    protected $table = 'users';

    
    protected $primaryKey = 'user_id';

    
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'usuario_ativo',
        'tipo_usuario',
    ];

    public static function criar($request){
        return self::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password']
        ]);
    }

    public function isAdmin() {
        return $this->tipo_usuario === 'Administrador';
    }

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class, 'colaborador_id');
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
