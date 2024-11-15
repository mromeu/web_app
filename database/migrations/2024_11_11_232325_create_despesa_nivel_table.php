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
        Schema::create('despesa_nivel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('despesa_orcamento_id')->constrained('despesa_orcamento');
            $table->foreignId('despesa_visao_id')->constrained('despesa_visao');
            $table->string('despesa_nivel_nome');
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
        Schema::dropIfExists('despesa_nivel');
    }
};
