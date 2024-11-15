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
        Schema::create('unidade', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('unidade');
            $table->string('unidade_nome');
            $table->string('unidade_razao_social')->nullable();
            $table->string('unidade_cnpj')->nullable();
            $table->string('unidade_codigo')->nullable();            
            $table->string('unidade_endereco')->nullable();
            $table->string('unidade_bairro')->nullable();
            $table->string('unidade_cep')->nullable();
            $table->foreignId('pais_id')->constrained('pais');
            $table->foreignId('estado_id')->constrained('estado');
            $table->foreignId('cidade_id')->constrained('cidade');
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
        Schema::dropIfExists('unidade');
    }
};
