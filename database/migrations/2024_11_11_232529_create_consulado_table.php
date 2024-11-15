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
        Schema::create('consulado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_consulado_id')->constrained('common_tipo_consulado');
            $table->foreignId('pais_consulado_id')->constrained('pais');
            $table->string('consulado_nome');
            $table->string('consulado_codigo')->nullable();            
            $table->string('consulado_endereco')->nullable();
            $table->string('consulado_bairro')->nullable();
            $table->string('consulado_cep')->nullable();
            $table->foreignId('pais_id')->constrained('pais')->nullable();
            $table->foreignId('estado_id')->constrained('estado')->nullable();
            $table->foreignId('cidade_id')->constrained('cidade')->nullable();
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
        Schema::dropIfExists('consulado');
    }
};
