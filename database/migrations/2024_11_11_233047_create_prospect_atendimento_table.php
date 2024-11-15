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
        Schema::create('prospect_atendimento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prospect_id')->constrained('prospect');
            $table->foreignId('tipo_atendimento_id')->constrained('common_tipo_atendimento');
            $table->date('prospect_atendimento_data')->nullable();
            $table->text('prospect_atendimento_mensagem')->nullable();
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
        Schema::dropIfExists('prospect_atendimento');
    }
};
