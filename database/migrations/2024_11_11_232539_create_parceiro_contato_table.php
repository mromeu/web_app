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
        Schema::create('parceiro_contato', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parceiro_id')->constrained('parceiro');
            $table->string('parceiro_contato_nome');
            $table->string('parceiro_contato_email')->nullable();
            $table->string('parceiro_contato_telefone')->nullable();
            $table->string('parceiro_contato_whatsapp')->nullable();            
            $table->text('parceiro_contato_obs')->nullable();
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
        Schema::dropIfExists('parceiro_contato');
    }
};
