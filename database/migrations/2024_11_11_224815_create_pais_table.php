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
        Schema::create('pais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('continente_id')->constrained('continente');
            $table->foreignId('moeda_id')->constrained('moeda');
            $table->string('pais_nome');
            $table->string('pais_slug')->nullable();
            $table->string('link_drive')->nullable();
            $table->boolean('pais_site')->default(0);
            $table->boolean('pais_destaque')->default(0);
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
        Schema::dropIfExists('pais');
    }
};
