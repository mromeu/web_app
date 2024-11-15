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
        Schema::create('conta_bancaria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_conta_id')->constrained('common_tipo_conta');
            $table->foreignId('empresa_id')->nullable()->constrained('empresa');
            $table->foreignId('unidade_id')->nullable()->constrained('unidade');
            $table->foreignId('parceiro_id')->nullable()->constrained('parceiro');
            $table->foreignId('fornecedor_id')->nullable()->constrained('fornecedor');
            $table->foreignId('user_id')->nullable()->constrained('users');            
            $table->foreignId('consulado_id')->nullable()->constrained('consulado');   
            $table->string('conta_nome');
            $table->string('conta_agencia')->nullable();
            $table->string('conta_numero')->nullable();
            $table->string('conta_sigla')->nullable();
            $table->string('conta_pix')->nullable();
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
        Schema::dropIfExists('conta_bancaria');
    }
};
