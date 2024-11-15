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
        Schema::create('cfs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_marketing_id')->constrained('common_categoria_marketing');
            $table->string('cfs_nome');
            $table->string('cfs_codigo');
            $table->boolean('cfs_site')->default(1);
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
        Schema::dropIfExists('cfs');
    }
};
