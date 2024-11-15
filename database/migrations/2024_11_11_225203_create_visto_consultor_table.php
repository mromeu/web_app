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
        Schema::create('visto_consultor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visto_id')->constrained('visto');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('visto_consultor');
    }
};
