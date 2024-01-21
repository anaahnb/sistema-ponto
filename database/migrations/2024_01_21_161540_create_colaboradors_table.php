<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id('colaborador_id');
            $table->foreignId('cargo_id')->constrained('cargos');
            $table->foreignId('funcao_id')->constrained('funcoes');
            $table->foreignId('user_id')->constrained(); 
            $table->string('colaborador_cpf')->unique();
            $table->string('colaborador_nome');
            $table->string('colaborador_email')->unique();
            $table->date('colaborador_data_nascimento');
            $table->date('colaborador_data_admissao');
            $table->date('colaborador_data_rescisao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaboradores');
    }
}