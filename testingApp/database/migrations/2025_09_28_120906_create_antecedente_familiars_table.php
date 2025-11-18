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
        Schema::create('antecedente_familiars', function (Blueprint $table) {
            $table->id();
            $table->enum('diabetes', ['si', 'no']);
            $table->enum('hipertension', ['si', 'no']);
            $table->enum('accidente_cardiovascular', ['si', 'no']);
            $table->enum('cancer', ['si', 'no']);
            $table->enum('epilepsia', ['si', 'no']);
            $table->enum('enfermedad_mental', ['si', 'no']);
            $table->enum('alergias', ['si', 'no']);
            $table->enum('enfermedad_respiratoria', ['si', 'no']);
            $table->enum('cefalea', ['si', 'no']);
            $table->enum('enfermedad_visual', ['si', 'no']);
            $table->enum('hepatitis', ['si', 'no']);
            $table->enum('covid_19', ['si', 'no']);
            $table->enum('hernias', ['si', 'no']);
            $table->enum('enfermedad_oidos', ['si', 'no']);
            $table->enum('varices', ['si', 'no']);
            $table->enum('enfermedad_gastrointestinal', ['si', 'no']);
            $table->enum('enfermedad_cardiaca', ['si', 'no']);
            $table->enum('dermatitis', ['si', 'no']);
            $table->enum('enfermedad_renal', ['si', 'no']);
            $table->enum('enfermedad_tiroides', ['si', 'no']);
            $table->enum('enfermedad_osteomuscular', ['si', 'no']);
            $table->enum('enfermedad_psiquiatrica', ['si', 'no']);
            $table->enum('traumaticos', ['si', 'no']);
            $table->enum('cirugias', ['si', 'no']);
            $table->text('cuales_cirugias')->nullable();            
            $table->text('otros_antecedentes_familiares')->nullable();
            $table->text('antecedentes_familiares_observaciones')->nullable();


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
        Schema::dropIfExists('antecedente_familiars');
    }
};
