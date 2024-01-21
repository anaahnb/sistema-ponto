<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = ['Gerente', 'Desenvolvedor', 'Analista de Recursos Humanos', 'Designer', 'Analista Financeiro', 'Coordenador de Projetos', 'Engenheiro de Software', 'Analista de Marketing', 'Técnico de Suporte', 'Especialista em QA'];
        foreach ($cargos as $cargo) {
            DB::table('cargos')->insert(['cargo_nome' => $cargo]);
        }
    }
}
