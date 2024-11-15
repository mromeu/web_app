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
        Schema::create('checklist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compra_id')->constrained('compra');
            $table->foreignId('solicitante_id')->constrained('compra');            
            $table->foreignId('procedimento_id')->constrained('procedimento');
            $table->foreignId('status_procedimento_id')->constrained('common_status_procedimento');
            $table->date('checklist_data')->nullable();
            $table->date('checklist_finalizacao')->nullable();            
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
        Schema::dropIfExists('checklist');
    }
};
