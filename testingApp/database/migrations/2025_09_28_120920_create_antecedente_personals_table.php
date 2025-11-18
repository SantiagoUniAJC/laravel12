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
        Schema::create('antecedente_personals', function (Blueprint $table) {
            $table->id();
            $table->enum('gestas', ['si', 'no']);
            $table->enum('partos', ['si', 'no']);
            $table->enum('cesareas', ['si', 'no']);
            $table->enum('nacidos_vivos', ['si', 'no']);
            $table->enum('abortos', ['si', 'no']);
            $table->enum('otros_antecedentes_ginecobstetricos', ['si', 'no']);
            $table->enum('menarca', ['si', 'no']);
            $table->date('fecha_ultima_menstruacion')->nullable();
            $table->date('fecha_ultima_citologia')->nullable();
            $table->string('ciclos')->nullable();
            $table->string('resultado_ultima_citologia')->nullable();
            $table->enum('planifica', ['si', 'no']);
            $table->string('hemoclasificacion_referido_por_usuario')->nullable();
            $table->enum('porta_carnet', ['si', 'no']);
            $table->enum('antitetanica', ['si', 'no']);
            $table->date('antitetanica_fecha_ultima_dosis')->nullable();
            $table->enum('antitetanica_esquema_completo', ['si', 'no']);
            $table->enum('hepatitis_a', ['si', 'no']);
            $table->date('hepatitis_a_fecha_ultima_dosis')->nullable();
            $table->enum('hepatitis_a_esquema_completo', ['si', 'no']);
            $table->enum('hepatitis_b', ['si', 'no']);
            $table->date('hepatitis_b_fecha_ultima_dosis')->nullable();
            $table->enum('hepatitis_b_esquema_completo', ['si', 'no']);
            $table->enum('fiebre_amarilla', ['si', 'no']);
            $table->date('fiebre_amarilla_fecha_ultima_dosis')->nullable();
            $table->enum('fiebre_amarilla_esquema_completo', ['si', 'no']);
            $table->enum('influenza', ['si', 'no']);
            $table->date('influenza_fecha_ultima_dosis')->nullable();
            $table->enum('influenza_esquema_completo', ['si', 'no']);
            $table->enum('varicela', ['si', 'no']);
            $table->date('varicela_fecha_ultima_dosis')->nullable();
            $table->enum('varicela_esquema_completo', ['si', 'no']);
            $table->enum('meningococo', ['si', 'no']);
            $table->date('meningococo_fecha_ultima_dosis')->nullable();
            $table->enum('meningococo_esquema_completo', ['si', 'no']);
            $table->enum('virus_papiloma_humano', ['si', 'no']);
            $table->date('virus_papiloma_humano_fecha_ultima_dosis')->nullable();
            $table->enum('virus_papiloma_humano_esquema_completo', ['si', 'no']);
            $table->enum('covid_19', ['si', 'no']);
            $table->date('covid_19_fecha_ultima_dosis')->nullable();
            $table->enum('covid_19_esquema_completo', ['si', 'no']);
            $table->enum('otros', ['si', 'no']);
            $table->date('otros_fecha_ultima_dosis')->nullable();
            $table->enum('otros_esquema_completo', ['si', 'no']);
            
            $table->unsignedBigInteger('historia_clinica_id');
            $table->foreign('historia_clinica_id')->references('id')->on('historia_clinicas')->onDelete('cascade');
            $table->unsignedBigInteger('paciente_id')->index();
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedente_personals');
    }
};
