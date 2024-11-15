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
        Schema::create('setor', function (Blueprint $table) {
            $table->id();
            $table->string('setor_nome');
            $table->string('setor_codigo');
            $table->boolean('active')->default(1);
            $table->foreignId('user_ins_id')->constrained('users');
            $table->foreignId('user_upd_id')->constrained('users');
            $table->timestamps();
        });

        $insert = [
            'setor_nome'    => 'Sistema',
            'setor_codigo'  => 'SYS',
            'active'        => 1,
            'user_ins_id'   => 1,
            'user_upd_id'   => 1,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ];

        DB::table('setor')->insert($insert);         
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setor');
    }
};
