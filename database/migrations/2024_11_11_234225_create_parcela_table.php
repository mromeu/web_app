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
        Schema::create('parcela', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recibo_id')->constrained('recibo');
            $table->foreignId('forma_recebimento_id')->nullable()->constrained('forma_recebimento');
            $table->foreignId('conta_bancaria_id')->nullable()->constrained('conta_bancaria');
            $table->foreignId('status_parcela_id')->nullable()->constrained('common_status_parcela');
            $table->decimal('parcela_valor', 10, 2)->default(0.0);
            $table->date('parcela_data')->nullable();
            $table->date('parcela_data_pagamento')->nullable();            
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
        Schema::dropIfExists('parcela');
    }
};
