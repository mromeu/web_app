<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->id();
            $table->string('perfil_nome');
            $table->boolean('perfil_admin')->nullable()->default(0);
            $table->boolean('active')->nullable()->default(1);
            $table->foreignId('user_ins_id')->constrained('users');
            $table->foreignId('user_upd_id')->constrained('users');   
            $table->timestamps();
        });


        $insert = [
            'perfil_nome'   => 'Administrador',
            'perfil_admin'  => 1,
            'active'        => 1,
            'user_ins_id'   => 1,
            'user_upd_id'   => 1,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ];

        DB::table('perfil')->insert($insert); 
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil');
    }
};
