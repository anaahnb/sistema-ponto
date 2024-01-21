<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'dev',
            'email' => 'dev@dev.com',
            'tipo_usuario' => 'Administrador',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'ana',
            'email' => 'ana@email.com',
            'tipo_usuario' => 'Colaborador',
            'password' => Hash::make('123'),
        ]);
    }
}
