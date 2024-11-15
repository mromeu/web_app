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
        Schema::create('empresa', function (Blueprint $table) {
            $table->id();
            $table->string('empresa_nome');
            $table->string('empresa_razao_social')->nullable();
            $table->string('empresa_cnpj')->nullable();
            $table->string('empresa_codigo')->nullable();   
            $table->string('empresa_endereco')->nullable();
            $table->string('empresa_bairro')->nullable();
            $table->string('empresa_cep')->nullable();
            $table->foreignId('pais_id')->constrained('pais');
            $table->foreignId('estado_id')->constrained('estado');
            $table->foreignId('cidade_id')->constrained('cidade');
            $table->string('empresa_logotipo')->nullable();
            $table->string('empresa_chave_pix')->nullable();
            $table->string('empresa_site')->nullable();
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
        Schema::dropIfExists('empresa');
    }
};
