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
        Schema::create('taxa_especial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('moeda_id')->constrained('moeda');
            $table->string('taxa_especial_nome');
            $table->decimal('taxa_especial_valor', 10, 2)->default(0.0);
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
        Schema::dropIfExists('taxa_especial');
    }
};
