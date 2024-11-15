<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cargo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cargo_superior_id')->nullable()->constrained('cargo');
            $table->foreignId('setor_id')->constrained('setor');
            $table->foreignId('perfil_id')->constrained('perfil');
            $table->string('cargo_nome');
            $table->boolean('cargo_lideranca')->default(0);
            $table->boolean('active')->default(1);
            $table->foreignId('user_ins_id')->constrained('users');
            $table->foreignId('user_upd_id')->constrained('users');
            $table->timestamps();
        });

        $insert = [
            'cargo_superior_id' => null,
            'setor_id'          => 1,
            'perfil_id'         => 1,
            'cargo_nome'        => 'Administrador',
            'active'        => 1,
            'user_ins_id'   => 1,
            'user_upd_id'   => 1,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ];

        DB::table('cargo')->insert($insert);                 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargo');
    }
};
