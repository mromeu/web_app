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
        Schema::create('modulo', function (Blueprint $table) {
            $table->id();
            $table->string('modulo_nome');
            $table->timestamps();
        });

        $modulos = [
            ['modulo_nome' => 'user'],
            ['modulo_nome' => 'common'],
            ['modulo_nome' => 'perfil'],
            ['modulo_nome' => 'setor'],
            ['modulo_nome' => 'cargo'],
            ['modulo_nome' => 'continente'],
            ['modulo_nome' => 'moeda'],
            ['modulo_nome' => 'pais'],
            ['modulo_nome' => 'estado'],
            ['modulo_nome' => 'cidade'],
            ['modulo_nome' => 'empresa'],
            ['modulo_nome' => 'unidade'],
            ['modulo_nome' => 'banco'],
            ['modulo_nome' => 'procedimento'],
            ['modulo_nome' => 'visto_tipo'],
            ['modulo_nome' => 'visto'],
            ['modulo_nome' => 'taxa_especial'],
            ['modulo_nome' => 'forma_pagamento'],
            ['modulo_nome' => 'forma_recebimento'],
            ['modulo_nome' => 'despesa_orcamento'],
            ['modulo_nome' => 'despesa_visao'],
            ['modulo_nome' => 'despesa_nivel'],
            ['modulo_nome' => 'despesa'],
            ['modulo_nome' => 'fornecedor'],
            ['modulo_nome' => 'consulado'],
            ['modulo_nome' => 'parceiro'],
            ['modulo_nome' => 'cfs'],
            ['modulo_nome' => 'prospect'],
            ['modulo_nome' => 'solicitante'],
            ['modulo_nome' => 'conta_bancaria'],
            ['modulo_nome' => 'checklist'],
            ['modulo_nome' => 'recibo'],
            ['modulo_nome' => 'permissao']
        ];

        $timestamp = Carbon::now();
        foreach ($modulos as &$modulo) {
            $modulo['created_at'] = $timestamp;
            $modulo['updated_at'] = $timestamp;
        }

        DB::table('modulo')->insert($modulos);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modulo');
    }
};
