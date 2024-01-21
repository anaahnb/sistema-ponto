<?php

namespace Database\Seeders;

use App\Models\Funcao;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcoes = ['Desenvolvedor Júnior', 'Designer gráfico', 'Analista de Recursos Humanos', 'Analista Financeiro', 'Coordenador de Projetos', 'Engenheiro de Software', 'Analista de Marketing', 'Técnico de Suporte', 'Especialista em QA Pleno'];
        foreach ($funcoes as $funcao) {
            DB::table('funcoes')->insert(['funcao_nome' => $funcao]);

        }
    }
}
