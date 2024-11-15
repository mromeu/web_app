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
        Schema::create('permissao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perfil_id')->nullable()->constrained('perfil'); // Permissão para perfil
            $table->foreignId('user_id')->nullable()->constrained('users');    // Ou usuário específico
            $table->string('permissao_slug')->nullable(); // Exemplo: 'user.create', 'user.view'
            $table->foreignId('tipo_permissao_id')->nullable()->constrained('common_tipo_permissao'); // Ex.: GLOBAL, EDIT
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissao');
    }
};
