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
        Schema::create('motivo_consultas', function (Blueprint $table) {
            $table->id();
            $table->enum('motivo_consulta', ['Evaluacion Medica Ocupacional', 'Control por enfermedad laboral calificada', 'Control por secuela(s) de accidente de trabajo', 'Control de restricciones medicas', 'Control por enfermedad de origen comun', 'Control por enfermedad laboral en estudio', 'Control por accidente comun', 'Control de recomendaciones medicas', 'Otro']);
            $table->text('descripcion_consulta');
            $table->enum('estado_actual_de_salud', ['Bueno', 'Regular', 'Malo']);
            $table->enum('restricciones_medicas_vigentes', ['si', 'no']);
            $table->text('descripcion_estado_actual_de_salud');
            $table->string('empresa_anterior')->nullable();
            $table->string('cargo_anterior')->nullable();
            $table->decimal('tiempo_laborado')->nullable();
            $table->enum('factores_riesgo', ['Fisicos', 'Quimicos', 'Biologicos', 'Ergonomicos', 'Psicosociales', 'Mecanicos', 'Otro', 'No aplica']);
            $table->enum('uso_epp', ['Si', 'No', 'No aplica']);
            $table->string('motivo_retiro')->nullable();
            $table->date('fecha_retiro')->nullable();
            $table->enum('accidentes_laborales', ['Si', 'No', 'No aplica'])->nullable();
            $table->enum('accidentes_laborales_empresa_anterior', ['Si', 'No', 'No aplica'])->nullable();
            $table->enum('accidentes_laborales_empresa_actual', ['Si', 'No', 'No aplica'])->nullable();
            $table->date('fecha_accidente_laboral')->nullable();
            $table->string('empresa_accidente_laboral')->nullable();
            $table->string('descripcion_accidente_laboral')->nullable();
            $table->enum('fue_calificada_e_indemnizada', ['Si', 'No', 'No aplica']);
            $table->enum('secuelas', ['Si', 'No', 'No aplica']);
            $table->string('descripcion_secuelas')->nullable();

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
        Schema::dropIfExists('motivo_consultas');
    }
};
