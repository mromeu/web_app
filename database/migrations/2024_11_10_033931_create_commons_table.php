<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('common_tables', function (Blueprint $table) {
            $table->id('common_table_id');
            $table->string('common_table_name');
            $table->string('common_table_db_name');
            $table->timestamps();
        });

        Schema::create('common_status_aprovacao', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_estado_civil', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_categoria_marketing', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_tipo_contrato', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_formacao_academica', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_tipo_aplicacao', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_tipo_atendimento', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_status_passaporte', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_referencia_procedimento', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_proposito_viagem', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_retorno_passaporte', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_tipo_negocio', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_status_aplicacao', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_status_prospect', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_tipo_parceiro', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_tipo_conta', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_genero', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_profissao', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });        

        Schema::create('common_nacionalidade', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        }); 

        Schema::create('common_tipo_consulado', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_tipo_cargo', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_status_procedimento', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_status_parcela', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_status_despesa', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('common_tipo_permissao', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });


        $tables = array(
            [
                'common_table_name'     => 'Status da aprovação',
                'common_table_db_name' => 'common_status_aprovacao',
            ],

            [
                'common_table_name'     => 'Estado civil',
                'common_table_db_name' => 'common_estado_civil',
            ],

            [
                'common_table_name'     => 'Categoria de marketing',
                'common_table_db_name' => 'common_categoria_marketing',
            ],

            [
                'common_table_name'     => 'Tipo de contrato',
                'common_table_db_name' => 'common_tipo_contrato',
            ],

            [
                'common_table_name'     => 'Formação acadêmica',
                'common_table_db_name' => 'common_formacao_academica',
            ],

            [
                'common_table_name'     => 'Tipo de aplicação',
                'common_table_db_name' => 'common_tipo_aplicacao',
            ],

            [
                'common_table_name'     => 'Tipo de atendimento',
                'common_table_db_name' => 'common_tipo_atendimento',
            ],

            [
                'common_table_name'     => 'Status do passaporte',
                'common_table_db_name' => 'common_status_passaporte',
            ],

            [
                'common_table_name'     => 'Referência do procedimento',
                'common_table_db_name' => 'common_referencia_procedimento',
            ],

            [
                'common_table_name'     => 'Propósito da viagem',
                'common_table_db_name' => 'common_proposito_viagem',
            ],

            [
                'common_table_name'     => 'Retorno do passaporte',
                'common_table_db_name' => 'common_retorno_passaporte',
            ],

            [
                'common_table_name'     => 'Tipo de negócio',
                'common_table_db_name' => 'common_tipo_negocio',
            ],

            [
                'common_table_name'     => 'Status da aplicação',
                'common_table_db_name' => 'common_status_aplicacao',
            ],

            [
                'common_table_name'     => 'Status do prospect',
                'common_table_db_name' => 'common_status_prospect',
            ],

            [
                'common_table_name'     => 'Tipo de parceiro',
                'common_table_db_name' => 'common_tipo_parceiro',
            ],

            [
                'common_table_name'     => 'Tipo de conta',
                'common_table_db_name' => 'common_tipo_conta',
            ],

            [
                'common_table_name'     => 'Gênero',
                'common_table_db_name' => 'common_genero',
            ],

            [
                'common_table_name'     => 'Profissão',
                'common_table_db_name' => 'common_profissao',
            ],

            [
                'common_table_name'     => 'Nacionalidade',
                'common_table_db_name' => 'common_nacionalidade',
            ],

            [
                'common_table_name'     => 'Tipo de consulado',
                'common_table_db_name' => 'common_tipo_consulado',
            ],

            [
                'common_table_name'     => 'Tipo de cargo',
                'common_table_db_name' => 'common_tipo_cargo',
            ],

            [
                'common_table_name'     => 'Status do procedimento',
                'common_table_db_name' => 'common_status_procedimento',
            ],

            [
                'common_table_name'     => 'Status da parcela',
                'common_table_db_name' => 'common_status_parcela',
            ],

            [
                'common_table_name'     => 'Status da despesa',
                'common_table_db_name' => 'common_status_despesa',
            ],

            [
                'common_table_name'     => 'Tipos de permissões',
                'common_table_db_name' => 'common_tipo_permissao',
            ],
        );

        DB::table('common_tables')->insert($tables);

        $timestamp = Carbon::now();

        $permissions = [
            ['name' => 'FULL_ACCESS', 'code' => 'CAD'],
            ['name' => 'NO_ACCESS', 'code' => 'BLO'],
            ['name' => 'READ', 'code' => 'LEI'],
            ['name' => 'READ_WRITE', 'code' => 'EDI'],
        ];

        $data = [];
        
        foreach ($permissions as $permission) {
            $data[] = array_merge($permission, [
                'active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }

        DB::table('common_tipo_permissao')->insert($data);        
    }

    public function down(): void
    {
        Schema::dropIfExists('common_tables');
        Schema::dropIfExists('common_status_aprovacao');
        Schema::dropIfExists('common_estado_civil');
        Schema::dropIfExists('common_categoria_marketing');
        Schema::dropIfExists('common_genero');
        Schema::dropIfExists('common_tipo_contrato');
        Schema::dropIfExists('common_formacao_academica');
        Schema::dropIfExists('common_tipo_aplicacao');
        Schema::dropIfExists('common_tipo_atendimento');
        Schema::dropIfExists('common_status_passaporte');
        Schema::dropIfExists('common_referencia_procedimento');
        Schema::dropIfExists('common_proposito_viagem');
        Schema::dropIfExists('common_retorno_passaporte');
        Schema::dropIfExists('common_tipo_negocio');
        Schema::dropIfExists('common_status_aplicacao');
        Schema::dropIfExists('common_status_despesa');
        Schema::dropIfExists('common_status_prospect');
        Schema::dropIfExists('common_tipo_parceiro');
        Schema::dropIfExists('common_tipo_conta');
        Schema::dropIfExists('common_profissao');
        Schema::dropIfExists('common_nacionalidade');
        Schema::dropIfExists('common_tipo_consulado');
        Schema::dropIfExists('common_tipo_cargo');
        Schema::dropIfExists('common_status_procedimento');
        Schema::dropIfExists('common_status_parcela');
        Schema::dropIfExists('common_tipo_permissao');
    }
};
