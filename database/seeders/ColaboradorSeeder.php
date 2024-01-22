<?php

namespace Database\Seeders;

use App\Models\Colaborador;
use Illuminate\Database\Seeder;

class ColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $colaboradores = [
        //     'Gerente',
        //     'Desenvolvedor',
        //     'Analista de Recursos Humanos',
        //     'Designer',
        //     'Analista Financeiro',
        //     'Coordenador de Projetos',
        //     'Engenheiro de Software',
        //     'Analista de Marketing',
        //     'Técnico de Suporte',
        //     'Especialista em QA'
        // ];
        // foreach ($colaboradores as $colaborador) {
            Colaborador::create([
                'cargo_id' => 1,
                'funcao_id' => 1,
                'user_id' => 1,
                'colaborador_cpf' => '61007944382',
                'colaborador_nome' => 'Ana Julia',
                'colaborador_email' => 'ana@dev.com',
                'colaborador_data_nascimento' => '2000-04-25',
                'colaborador_data_admissao' => '2000-04-25',
                'colaborador_data_rescisao' => null
            ]);
        }
    }
// }
