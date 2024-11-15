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
        Schema::create('solicitante', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unidade_id')->nullable()->constrained('unidade');
            $table->foreignId('parceiro_id')->nullable()->constrained('parceiro');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('estado_civil')->nullable()->constrained('common_estado_civil');
            $table->foreignId('genero_id')->nullable()->constrained('common_genero');
            $table->foreignId('profissao_id')->nullable()->constrained('common_profissao');
            $table->foreignId('nacionalidade_id')->nullable()->constrained('common_nacionalidade');
            $table->foreignId('proposito_viagem_id')->nullable()->constrained('common_proposito_viagem');
            $table->foreignId('retorno_passaporte_id')->nullable()->constrained('common_retorno_passaporte');
            $table->foreignId('prospect_id')->nullable()->constrained('prospect');
            $table->foreignId('cfs_id')->nullable()->constrained('cfs');
            $table->string('solicitante_nome');
            $table->string('solicitante_email')->nullable();
            $table->string('solicitante_email2')->nullable();
            $table->string('solicitante_telefone')->nullable();
            $table->string('solicitante_celular')->nullable();
            $table->string('solicitante_mensagem')->nullable();
            $table->date('solicitante_data_nascimento')->nullable();
            $table->string('solicitante_rg')->nullable();
            $table->string('solicitante_cpf')->nullable();
            $table->string('solicitante_naturalidade')->nullable();
            $table->string('solicitante_endereco')->nullable();
            $table->string('solicitante_bairro')->nullable();
            $table->string('solicitante_cep')->nullable();
            $table->foreignId('pais_id')->nullable()->constrained('pais');
            $table->foreignId('estado_id')->nullable()->constrained('estado');
            $table->foreignId('cidade_id')->nullable()->constrained('cidade');
            $table->string('solicitante_retorno_endereco')->nullable();
            $table->string('solicitante_retorno_complemento')->nullable();
            $table->string('solicitante_retorno_bairro')->nullable();
            $table->string('solicitante_retorno_cep')->nullable();
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
        Schema::dropIfExists('solicitante');
    }
};
