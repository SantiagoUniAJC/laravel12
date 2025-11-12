<?php

use App\Models\Cita;
use App\Models\HistoriaClinica;
use App\Models\HC\InfoLaboralActual;
use App\Models\Paciente;
use Livewire\Volt\Component;

new class extends Component {
    public HistoriaClinica $historia;
    public $area_de_trabajo;
    public $descripcion_del_cargo;
    public $turno_de_trabajo;
    public $rango_salarial;
    public $fecha_ingreso;
    public $factores_de_riesgo_para_el_cargo;
    public $exposicion_a_factores_de_riesgo;

    public array $uso_epp = [];
    //uso_de_epp;
    public $casco;
    public $gafas;
    public $protectores_auditivos;
    public $protectores_respiratorios;
    public $guantes;
    public $botas;

    public array $tipos_factores_de_riesgo = [];

    public function mount(HistoriaClinica $historia): void
    {
        $this->historia = $historia;
    }

    public function guardarInfoLaboralActual()
    {
        InfoLaboralActual::create([
            'area_de_trabajo' => $this->area_de_trabajo,
            'descripcion_del_cargo' => $this->descripcion_del_cargo,
            'turno_de_trabajo' => $this->turno_de_trabajo,
            'rango_salarial' => $this->rango_salarial,
            'fecha_ingreso' => $this->fecha_ingreso,
            'factores_de_riesgo_para_el_cargo' => $this->factores_de_riesgo_para_el_cargo,
            'exposicion_a_factores_de_riesgo' => $this->exposicion_a_factores_de_riesgo,
            'tipos_de_factores_de_riesgo' => json_encode(['pendiente logica para esto']),
            'uso_de_epp' => json_encode([
                'casco' => $this->casco ? true : false,
                'gafas' => $this->gafas ? true : false,
                'protectores_auditivos' => $this->protectores_auditivos ? true : false,
                'protectores_respiratorios' => $this->protectores_respiratorios ? true : false,
                'guantes' => $this->guantes ? true : false,
                'botas' => $this->botas ? true : false,
            ]),
            'historia_clinica_id' => $this->historia->id,
            'paciente_id' => $this->historia->paciente_id,
            
        ]);

        return redirect(route('historias-clinicas.create', [$this->historia->paciente_id, $this->historia->cita_id]))->with('success', 'Información Laboral creada con éxito');
    }
}; ?>


<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
            {{ 'Informacion Laboral Actual:' }}
            {{ $historia->paciente->nombres . ' ' . $historia->paciente->apellidos }}
        </h1>

        <flux:menu.separator />
        <br>
    </x-slot>

    <div class="max-w-full mx-auto p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <form wire:submit.prevent='guardarInfoLaboralActual' enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-input-field name="area_de_trabajo" label="Area de Trabajo" model="area_de_trabajo" />

                <x-input-field name="descripcion_del_cargo" label="Descripcion del cargo"
                    model="descripcion_del_cargo" />

                <x-select-field name="turno_de_trabajo" label="Turno de Trabajo" model="turno_de_trabajo"
                    :options="[
                        '' => 'Seleccione una opción',
                        'Desconoce' => 'Desconoce',
                        'Diurno' => 'Diurno',
                        'Nocturno' => 'Nocturno',
                        'Rotativo' => 'Rotativo',
                    ]" />

                <x-select-field name="rango_salarial" label="Rango Salarial" model="rango_salarial" :options="[
                    '' => 'Seleccione un rango',
                    'Desconoce' => 'Desconoce',
                    'Menor a 2 SMMLV' => 'Menor a 2 SMMLV',
                    'Entre 2 y 5 SMMLV' => 'Entre 2 y 5 SMMLV',
                    'Mayor a 5 SMMLV' => 'Mayor a 5 SMMLV',
                ]" />
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-input-field name="fecha_ingreso" label="Fecha de Ingreso" type="date" model="fecha_ingreso" />

                <x-input-field name="" label="Antiguedad en la Empresa" placeholder="Pendiente calcular en años"
                    readonly />

                <x-select-field name="factores_de_riesgo_para_el_cargo" label="Factores de Riesgo para el Cargo"
                    model="factores_de_riesgo_para_el_cargo" :options="[
                        '' => 'Seleccione un factor',
                        'Desconoce' => 'Desconoce',
                        'suministrados por el trabajador' => 'Suministrados por el trabajador',
                        'suministrados por la empresa' => 'Suministrados por la empresa',
                    ]" />

                <x-select-field name="exposicion_a_factores_de_riesgo" label="Exposicion a Factores de Riesgo"
                    model="exposicion_a_factores_de_riesgo" :options="[
                        '' => 'Seleccione un factor',
                        'Desconoce' => 'Desconoce',
                        'Fisicos' => 'Fisicos',
                        'Quimicos' => 'Quimicos',
                        'Biologicos' => 'Biologicos',
                        'Mecanicos' => 'Mecanicos',
                        'Biomecanicos' => 'Biomecanicos',
                        'Psicosocial' => 'Psicosocial',
                        'Seguridad' => 'Seguridad',
                        'Locativos' => 'Locativos',
                        'Otros' => 'Otros',
                    ]" />
            </div>

            <flux:menu.separator />
            {{-- Uso de EPP --}}
            <div class="sm:col-span-2 lg:col-span-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Uso de EPP</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                    <label class="inline-flex items-center space-x-2">
                        <input wire:model="casco" type="checkbox" value="casco" class="form-checkbox text-blue-600">
                        <span class="text-gray-800 dark:text-gray-200">Casco</span>
                    </label>

                    <label class="inline-flex items-center space-x-2">
                        <input wire:model="gafas" type="checkbox" value="gafas" class="form-checkbox text-blue-600">
                        <span class="text-gray-800 dark:text-gray-200">Gafas</span>
                    </label>

                    <label class="inline-flex items-center space-x-2">
                        <input wire:model="protectores_auditivos" type="checkbox" value="protectores_auditivos"
                            class="form-checkbox text-blue-600">
                        <span class="text-gray-800 dark:text-gray-200">Protectores Auditivos</span>
                    </label>

                    <label class="inline-flex items-center space-x-2">
                        <input wire:model="protectores_respiratorios" type="checkbox" value="protectores_respiratorios"
                            class="form-checkbox text-blue-600">
                        <span class="text-gray-800 dark:text-gray-200">Protectores Respiratorios</span>
                    </label>

                    <label class="inline-flex items-center space-x-2">
                        <input wire:model="guantes" type="checkbox" value="guantes" class="form-checkbox text-blue-600">
                        <span class="text-gray-800 dark:text-gray-200">Guantes</span>
                    </label>

                    <label class="inline-flex items-center space-x-2">
                        <input wire:model="botas" type="checkbox" value="botas" class="form-checkbox text-blue-600">
                        <span class="text-gray-800 dark:text-gray-200">Botas</span>
                    </label>
                </div>
            </div>
            <flux:menu.separator />
            <!-- Botón -->
            <x-action-button class="mt-2" label="Guardar Información" variant="success" />
        </form>
    </div>
</div>
