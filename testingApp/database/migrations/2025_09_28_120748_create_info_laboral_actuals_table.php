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
        Schema::create('info_laboral_actuals', function (Blueprint $table) {
            $table->id();
            $table->string('area_de_trabajo');
            $table->string('descripcion_del_cargo');
            $table->enum('turno_de_trabajo', ['Desconoce', 'Diurno', 'Nocturno', 'Rotativo']);
            $table->enum('rango_salarial', ['Desconoce', 'Menor a 2 SMMLV', 'Entre 2 y 5 SMMLV', 'Mayor a 5 SMMLV']);
            $table->date('fecha_ingreso')->nullable();
            $table->enum('factores_de_riesgo_para_el_cargo', ['Desconoce', 'suministrados por el trabajador', 'suministrados por la empresa']);
            $table->enum('exposicion_a_factores_de_riesgo', ['Desconoce', 'Fisicos', 'Quimicos', 'Biologicos', 'Mecanicos', 'Biomecanicos', 'Psicosocial', 'Seguridad', 'Locativos', 'Otros']);
            $table->json('tipos_factores_de_riesgo')->nullable();
            $table->json('uso_de_epp')->nullable();

            $table->unsignedBigInteger('historia_clinica_id');
            $table->foreign('historia_clinica_id')->references('id')->on('historia_clinicas')->onDelete('cascade');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_laboral_actuals');
    }
};
