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
        Schema::create('parceiro', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_parceiro_id')->constrained('common_tipo_parceiro');
            $table->foreignId('unidade_id')->nullable()->constrained('unidade');
            $table->string('parceiro_nome');
            $table->string('parceiro_razao_social')->nullable();
            $table->string('parceiro_cnpj')->nullable();
            $table->string('parceiro_codigo')->nullable();            
            $table->string('parceiro_endereco')->nullable();
            $table->string('parceiro_bairro')->nullable();
            $table->string('parceiro_cep')->nullable();
            $table->foreignId('pais_id')->constrained('pais')->nullable();
            $table->foreignId('estado_id')->constrained('estado')->nullable();
            $table->foreignId('cidade_id')->constrained('cidade')->nullable();
            $table->string('parceiro_logotipo')->nullable();
            $table->string('parceiro_chave_pix')->nullable();
            $table->string('parceiro_site')->nullable();
            $table->string('parceiro_email')->nullable();            
            $table->decimal('parceiro_valor_net', 10, 2)->default(0.0);
            $table->decimal('parceiro_valor_comissao', 10, 2)->default(0.0);
            $table->integer('parceiro_dia_fatura')->default(10);
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
        Schema::dropIfExists('parceiro');
    }
};
