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
        Schema::create('produto_compra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compra_id')->constrained('compra');
            $table->foreignId('visto_id')->constrained('visto');
            $table->foreignId('status_aprovacao_id')->constrained('common_status_aprovacao');            
            $table->foreignId('consulado_id')->constrained('consulado');
            $table->foreignId('consulado_casv_id')->constrained('consulado');            
            $table->date('produto_compra_data_aplicacao')->nullable();
            $table->date('produto_compra_data_entrevista')->nullable();
            $table->date('produto_compra_data_validade_taxa_consular')->nullable();
            $table->date('produto_compra_data_validade_visto')->nullable();
            $table->text('produto_compra_drive')->nullable();            
            $table->string('produto_compra_conta')->nullable();
            $table->string('produto_compra_yatri')->nullable();
            $table->string('produto_compra_rastreio')->nullable();
            $table->string('produto_compra_observacoes')->nullable();
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
        Schema::dropIfExists('produto_compra');
    }
};
