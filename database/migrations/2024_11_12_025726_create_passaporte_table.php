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
        Schema::create('passaporte', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prospect_id')->nullable()->constrained('prospect');
            $table->foreignId('solicitante_id')->nullable()->constrained('solicitante');
            $table->string('passaporte_numero');
            $table->string('passaporte_emissor')->nullable();
            $table->date('passaporte_data_emissao')->nullable();
            $table->date('passaporte_data_validade')->nullable();    
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
        Schema::dropIfExists('passaporte');
    }
};
