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
        Schema::create('compra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unidade_id')->nullable()->constrained('unidade');
            $table->foreignId('solicitante_id')->constrained('solicitante');
            $table->foreignId('produto_id')->constrained('produto');
            $table->foreignId('parceiro_id')->nullable()->constrained('parceiro');
            $table->decimal('compra_valor_taxa', 10,2)->default(0.0);
            $table->decimal('compra_valor_suporte', 10,2)->default(0.0);
            $table->decimal('compra_valor_correio', 10,2)->default(0.0);
            $table->decimal('compra_custo_taxa_previsto', 10,2)->default(0.0);
            $table->decimal('compra_custo_taxa_real', 10,2)->default(0.0);
            $table->decimal('compra_custo_correio_previsto', 10,2)->default(0.0);
            $table->decimal('compra_custo_correio_real', 10,2)->default(0.0);
            $table->decimal('compra_lucro_previsto', 10,2)->default(0.0);   
            $table->decimal('compra_lucro_real', 10,2)->default(0.0);
            $table->date('compra_data_pagamento_taxa')->nullable();
            $table->date('compra_data_pagamento_correio')->nullable();
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
        Schema::dropIfExists('compra');
    }
};
