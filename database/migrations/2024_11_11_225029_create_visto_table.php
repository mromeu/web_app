<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_aplicacao_id')->constrained('common_tipo_aplicacao');
            $table->foreignId('pais_id')->constrained('pais');
            $table->foreignId('visto_tipo_id')->constrained('visto_tipo');
            $table->foreignId('moeda_id')->constrained('moeda');
            $table->string('visto_codigo');
            $table->string('visto_formulario')->nullable();
            $table->integer('formulario_id')->nullable();
            $table->integer('visto_prazo_sistema')->nullable();
            $table->integer('visto_prazo_site')->nullable();
            $table->decimal('visto_taxa_consular', 10, 2)->default(0.0);
            $table->decimal('visto_taxa_servico', 10, 2)->default(0.0);;
            $table->decimal('visto_taxa_correio', 10, 2)->default(0.0);;
            $table->text('visto_conteudo')->nullable();
            $table->text('visto_orientacao')->nullable();
            $table->boolean('visto_site')->default(0);
            $table->boolean('active')->default(1);
            $table->foreignId('user_ins_id')->constrained('users');
            $table->foreignId('user_upd_id')->constrained('users');
            $table->timestamps();
        });
    }

    /** 
     * Criar uma tabela para cadastrar mais de uma taxa especial por visto: id, visto_id, nome, codigo, valor - deve poder selecionar vários vistos em um multi-select
     * Criar uma tabela para cadastrar os procedimentos por visto: visto_id, procedimento_id
     * Criar uma tabela para cadastrar mais de um consultor responsável pelo visto: visto_id, user_id
    */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visto');
    }
};
