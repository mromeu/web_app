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
        Schema::create('despesa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('despesa_orcamento_id')->constrained('despesa_orcamento');
            $table->foreignId('despesa_visao_id')->constrained('despesa_visao');
            $table->foreignId('despesa_nivel_id')->constrained('despesa_nivel');
            $table->foreignId('empresa_id')->constrained('empresa');
            $table->foreignId('unidade_id')->constrained('unidade');
            $table->foreignId('fornecedor_id')->constrained('fornecedor');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('status_despesa_id')->constrained('common_status_despesa');
            $table->integer('despesa_pai_id')->nullable();
            $table->date('despesa_data_lancamento')->nullable();
            $table->date('despesa_data_vencimento')->nullable();
            $table->date('despesa_data_pagamento')->nullable();
            $table->decimal('despesa_valor', 10, 2);
            $table->decimal('despesa_valor_total', 10, 2);
            $table->text('despesa_codigo_barra')->nullable();
            $table->text('despesa_arquivo')->nullable();
            $table->text('despesa_observacao')->nullable();
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
        Schema::dropIfExists('despesa');
    }
};
