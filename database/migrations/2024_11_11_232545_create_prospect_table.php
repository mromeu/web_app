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
        Schema::create('prospect', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parceiro_id')->nullable()->constrained('parceiro');
            $table->foreignId('unidade_id')->nullable()->constrained('unidade');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('estado_civil')->nullable()->constrained('common_estado_civil');
            $table->foreignId('genero_id')->nullable()->constrained('common_genero');
            $table->foreignId('profissao_id')->nullable()->constrained('common_profissao');
            $table->foreignId('nacionalidade_id')->nullable()->constrained('common_nacionalidade');
            $table->foreignId('proposito_viagem_id')->nullable()->constrained('common_proposito_viagem');
            $table->foreignId('retorno_passaporte_id')->nullable()->constrained('common_retorno_passaporte');
            $table->foreignId('status_prospect_id')->nullable()->constrained('common_status_prospect');
            $table->foreignId('cfs_id')->nullable()->constrained('cfs');
            $table->foreignId('pais_interesse_id')->nullable()->constrained('pais');
            $table->foreignId('visto_interesse_id')->nullable()->constrained('visto');
            $table->foreignId('forma_pagamento_id')->nullable()->constrained('forma_pagamento');
            $table->boolean('prospect_possui_visto_anterior')->default(0);
            $table->date('prospect_data_vencimento_boleto')->nullable();
            $table->date('prospect_data_proximo_contato')->nullable();
            $table->integer('prospect_quantidade_visto')->nullable();
            $table->string('prospect_nome');
            $table->string('prospect_email')->nullable();
            $table->string('prospect_telefone')->nullable();
            $table->string('prospect_celular')->nullable();
            $table->string('prospect_mensagem')->nullable();
            $table->date('prospect_data_nascimento')->nullable();
            $table->string('prospect_rg')->nullable();
            $table->string('prospect_cpf')->nullable();
            $table->string('prospect_naturalidade')->nullable();
            $table->string('prospect_endereco')->nullable();
            $table->string('prospect_complemento')->nullable();
            $table->string('prospect_bairro')->nullable();
            $table->string('prospect_cep')->nullable();
            $table->foreignId('pais_id')->nullable()->constrained('pais');
            $table->foreignId('estado_id')->nullable()->constrained('estado');
            $table->foreignId('cidade_id')->nullable()->constrained('cidade');
            $table->string('prospect_retorno_endereco')->nullable();
            $table->string('prospect_retorno_complemento')->nullable();
            $table->string('prospect_retorno_bairro')->nullable();
            $table->string('prospect_retorno_cep')->nullable();
            $table->foreignId('pais_retorno_id')->nullable()->constrained('pais');
            $table->foreignId('estado_retorno_id')->nullable()->constrained('estado');
            $table->foreignId('cidade_retorno_id')->nullable()->constrained('cidade');
            $table->boolean('active')->default(1);
            $table->foreignId('user_ins_id')->constrained('users');
            $table->foreignId('user_upd_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prospect');
    }
};
