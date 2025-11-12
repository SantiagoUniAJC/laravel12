<?php

use Livewire\Volt\Component;
use App\Models\HistoriaClinica;
use App\Models\HC\MotivoConsulta;

new class extends Component {
    public HistoriaClinica $historia;
    public $motivo_consulta;
    public $descripcion_consulta;
    public $estado_actual_de_salud;
    public $descripcion_estado_actual_de_salud;
    public $restricciones_medicas_vigentes;
    public $empresa_anterior;
    public $cargo_anterior;
    public $tiempo_laborado;
    public $factores_riesgo;
    public $uso_epp;
    public $motivo_retiro;
    public $fecha_retiro;
    public $accidentes_laborales;
    public $accidentes_laborales_empresa_anterior;
    public $accidentes_laborales_empresa_actual;
    public $fecha_accidente_laboral;
    public $empresa_accidente_laboral;
    public $descripcion_accidente_laboral;
    public $fue_calificada_e_indemnizada;
    public $secuelas;
    public $descripcion_secuelas;

    public function mount(HistoriaClinica $historia): void
    {
        $this->historia = $historia;
    }

    public function guardarMotivoConsulta()
    {
        $motivoConsulta = MotivoConsulta::create([
            'motivo_consulta' => $this->motivo_consulta,
            'descripcion_consulta' => $this->descripcion_consulta,
            'estado_actual_de_salud' => $this->estado_actual_de_salud,
            'descripcion_estado_actual_de_salud' => $this->descripcion_estado_actual_de_salud,
            'restricciones_medicas_vigentes' => $this->restricciones_medicas_vigentes,
            'empresa_anterior' => $this->empresa_anterior,
            'cargo_anterior' => $this->cargo_anterior,
            'tiempo_laborado' => $this->tiempo_laborado,
            'factores_riesgo' => $this->factores_riesgo,
            'uso_epp' => $this->uso_epp,
            'motivo_retiro' => $this->motivo_retiro,
            'fecha_retiro' => $this->fecha_retiro,
            'accidentes_laborales' => $this->accidentes_laborales,
            'accidentes_laborales_empresa_anterior' => $this->accidentes_laborales_empresa_anterior,
            'accidentes_laborales_empresa_actual' => $this->accidentes_laborales_empresa_actual,
            'fecha_accidente_laboral' => $this->fecha_accidente_laboral,
            'empresa_accidente_laboral' => $this->empresa_accidente_laboral,
            'descripcion_accidente_laboral' => $this->descripcion_accidente_laboral,
            'fue_calificada_e_indemnizada' => $this->fue_calificada_e_indemnizada,
            'secuelas' => $this->secuelas,
            'descripcion_secuelas' => $this->descripcion_secuelas,
            'historia_clinica_id' => $this->historia->id,
            'paciente_id' => $this->historia->paciente_id,
            
        ]);

        return redirect(route('historias-clinicas.create', [$this->historia->paciente_id, $this->historia->cita_id]))->with('success', 'Motivo de Consulta creado con éxito');
        
    }
}; ?>

<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
            {{ 'Motivo de Consulta:' }}
            {{ $historia->paciente->nombres . ' ' . $historia->paciente->apellidos }}
        </h1>

        <flux:menu.separator />
        <br>
    </x-slot>

    <div class="max-w-full mx-auto p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <form wire:submit.prevent='guardarMotivoConsulta' enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-select-field name="motivo_consulta" label="Motivo de Consulta" model="motivo_consulta"
                    :options="[
                        '' => 'Seleccione una opción',
                        'Evaluacion Medica Ocupacional' => 'Evaluacion Medica Ocupacional',
                        'Control por enfermedad laboral calificada' => 'Control por enfermedad laboral calificada',
                        'Control por secuela(s) de accidente de trabajo' =>
                            'Control por secuela(s) de accidente de trabajo',
                        'Control de restricciones medicas' => 'Control de restricciones medicas',
                        'Control por enfermedad de origen comun' => 'Control por enfermedad de origen comun',
                        'Control por enfermedad laboral en estudio' => 'Control por enfermedad laboral en estudio',
                        'Control por accidente comun' => 'Control por accidente comun',
                        'Control de recomendaciones medicas' => 'Control de recomendaciones medicas',
                        'Otro' => 'Otro',
                    ]" />
                <div class="sm:col-span-1 lg:col-span-3">
                    <x-textarea-field name="descripcion_consulta" label="Descripción de la Consulta"
                        model="descripcion_consulta" />
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-select-field name="estado_actual_de_salud" label="Estado Actual de Salud"
                    model="estado_actual_de_salud" :options="[
                        '' => 'Seleccione un estado',
                        'Bueno' => 'Bueno',
                        'Regular' => 'Regular',
                        'Malo' => 'Malo',
                    ]" />

                <div class="sm:col-span-1 lg:col-span-3">
                    <x-textarea-field name="descripcion_estado_actual_de_salud"
                        label="Descripción del Estado Actual de Salud" model="descripcion_estado_actual_de_salud" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-select-field name="restricciones_medicas_vigentes" label="Restricciones Médicas Vigentes"
                    model="restricciones_medicas_vigentes" :options="[
                        '' => 'Seleccione una opción',
                        'si' => 'SI',
                        'no' => 'NO',
                    ]" />

                <x-input-field name="empresa_anterior" label="Empresa Anterior" model="empresa_anterior" />

                <x-input-field name="cargo_anterior" label="Cargo Anterior" model="cargo_anterior" />

                <x-input-field name="tiempo_laborado" label="Tiempo en el Cargo" model="tiempo_laborado" type="number"
                    min="0" />

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <x-select-field name="factores_riesgo" label="Factores de Riesgo" model="factores_riesgo"
                    :options="[
                        '' => 'Seleccione una opción',
                        'Fisicos' => 'Fisicos',
                        'Quimicos' => 'Quimicos',
                        'Biologicos' => 'Biologicos',
                        'Ergonomicos' => 'Ergonomicos',
                        'Psicosociales' => 'Psicosociales',
                        'Mecanicos' => 'Mecanicos',
                        'Otro' => 'Otro',
                        'No aplica' => 'No aplica',
                    ]" />

                <x-select-field name="uso_epp" label="Uso de EPP" model="uso_epp" :options="[
                    '' => 'Seleccione una opción',
                    'Si' => 'SI',
                    'No' => 'NO',
                    'No aplica' => 'No aplica',
                ]" />

                <x-input-field name="motivo_retiro" label="Motivo de Retiro" model="motivo_retiro" type="text" />

                <x-input-field name="fecha_retiro" label="Fecha de Retiro" model="fecha_retiro" type="date" />

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <x-select-field name="accidentes_laborales" label="Accidentes Laborales" model="accidentes_laborales"
                    :options="[
                        '' => 'Seleccione una opción',
                        'Si' => 'SI',
                        'No' => 'NO',
                    ]" />

                <x-select-field name="accidentes_laborales_empresa_anterior"
                    label="Accidentes Laborales Empresa Anterior" model="accidentes_laborales_empresa_anterior"
                    :options="[
                        '' => 'Seleccione una opción',
                        'Si' => 'SI',
                        'No' => 'NO',
                    ]" />

                <x-select-field name="accidentes_laborales_empresa_actual" label="Accidentes Laborales Empresa Actual"
                    model="accidentes_laborales_empresa_actual" :options="[
                        '' => 'Seleccione una opción',
                        'Si' => 'SI',
                        'No' => 'NO',
                    ]" />

                <x-input-field name="fecha_accidente_laboral" label="Fecha de Accidente Laboral"
                    model="fecha_accidente_laboral" type="date" />

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <x-input-field name="empresa_accidente_laboral" label="Empresa del Accidente Laboral"
                    model="empresa_accidente_laboral" type="text" />

                <x-input-field name="descripcion_accidente_laboral" label="Descripción del Accidente Laboral"
                    model="descripcion_accidente_laboral" type="text" />

                <x-select-field name="fue_calificada_e_indemnizada" label="Fue Calificada e Indemnizada"
                    model="fue_calificada_e_indemnizada" :options="[
                        '' => 'Seleccione una opción',
                        'Si' => 'SI',
                        'No' => 'NO',
                        'No aplica' => 'No aplica',
                    ]" />

                <x-select-field name="secuelas" label="Secuelas" model="secuelas" :options="[
                    '' => 'Seleccione una opción',
                    'Si' => 'SI',
                    'No' => 'NO',
                    'No aplica' => 'No aplica',
                ]" />

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <x-input-field name="descripcion_secuelas" label="Descripción de Secuelas" model="descripcion_secuelas"
                    type="text" />
            </div>

            <flux:menu.separator />
            <!-- Botón -->
            <div class="flex justify-center">
                <x-action-button class="mt-2" label="Guardar Motivo de Consulta" variant="success" />
            </div>
        </form>
    </div>
</div>
