<?php

use Livewire\Volt\Component;
use App\Models\HistoriaClinica;
use Carbon\Carbon;

new class extends Component {
    public $historia;
    public $paciente;

    public function mount($historia)
    {
        $this->historia = HistoriaClinica::with('paciente', 'user')->find($historia);

        $this->infoLaboralActual = $this->historia->paciente->infoLaboralActual;

        $this->paciente = $this->historia->paciente;
        $this->user = $this->historia->user;
    }
}; ?>

<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">Información Laboral Actual
            Paciente: {{ $paciente->nombreCompleto }}</h1>
        <flux:menu.separator />
    </x-slot>

    <x-slot name="content">
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg p-6 border border-zinc-200 dark:border-zinc-700">

            {{-- Grid de información --}}
            <div class="grid md:grid-cols-4 gap-6">
                {{-- Card Área de trabajo --}}
                <div class="p-4 bg-gray-50 dark:bg-zinc-700 rounded-lg shadow-sm">
                    <div class="flex items-center mb-2">
                        <x-icon name="briefcase" class="w-5 h-5 text-purple-500" />
                        <span class="ml-2 font-semibold text-gray-900 dark:text-white">Área de trabajo</span>
                    </div>
                    <p class="text-sm text-right text-gray-700 dark:text-gray-300">
                        {{ $historia->paciente->infoLaboralActual->area_de_trabajo ?? 'No especificado' }}
                    </p>
                </div>

                {{-- Card Descripción del cargo --}}
                <div class="p-4 bg-gray-50 dark:bg-zinc-700 rounded-lg shadow-sm">
                    <div class="flex items-center mb-2">
                        <x-icon name="bars-3-bottom-left" class="w-5 h-5 text-purple-500" />
                        <span class="ml-2 font-semibold text-gray-900 dark:text-white">Descripción del Cargo</span>
                    </div>
                    <p class="text-sm text-right text-gray-700 dark:text-gray-300">
                        {{ $historia->paciente->infoLaboralActual->descripcion_del_cargo ?? 'No especificado' }}
                    </p>
                </div>

                {{-- Card Turno --}}
                <div class="p-4 bg-gray-50 dark:bg-zinc-700 rounded-lg shadow-sm">
                    <div class="flex items-center mb-2">
                        <x-icon name="clock" class="w-5 h-5 text-purple-500" />
                        <span class="ml-2 font-semibold text-gray-900 dark:text-white">Turno</span>
                    </div>
                    <p class="text-sm text-right text-gray-700 dark:text-gray-300">
                        {{ $historia->paciente->infoLaboralActual->turno_de_trabajo ?? 'No especificado' }}
                    </p>
                </div>

                {{-- Card Rango Salarial --}}
                <div class="p-4 bg-gray-50 dark:bg-zinc-700 rounded-lg shadow-sm">
                    <div class="flex items-center mb-2">
                        <x-icon name="currency-dollar" class="w-5 h-5 text-purple-500" />
                        <span class="ml-2 font-semibold text-gray-900 dark:text-white">Rango Salarial</span>
                    </div>
                    <p class="text-sm text-right text-gray-700 dark:text-gray-300">
                        {{ $historia->paciente->infoLaboralActual->rango_salarial ?? 'No especificado' }}
                    </p>
                </div>
            </div>

            {{-- Separador --}}
            <hr class="my-6 border-gray-300 dark:border-zinc-600">

            {{-- Grid fecha_ingreso --}}
            <div class="grid md:grid-cols-4 gap-6">
                {{-- Card Área de trabajo --}}
                <div class="p-4 bg-gray-50 dark:bg-zinc-700 rounded-lg shadow-sm">
                    <div class="flex items-center mb-2">
                        <x-icon name="calendar" class="w-5 h-5 text-purple-500" />
                        <span class="ml-2 font-semibold text-gray-900 dark:text-white">Fecha de Ingreso</span>
                    </div>
                    <p class="text-sm text-right text-gray-700 dark:text-gray-300">
                        {{ $historia->paciente->infoLaboralActual->fecha_ingreso ?? 'No especificado' }}
                    </p>
                </div>

                {{-- Card factores_de_riesgo --}}
                <div class="p-4 bg-gray-50 dark:bg-zinc-700 rounded-lg shadow-sm">
                    <div class="flex items-center mb-2">
                        <x-icon name="exclamation-triangle" class="w-5 h-5 text-purple-500" />
                        <span class="ml-2 font-semibold text-gray-900 dark:text-white">Factores de Riesgo</span>
                    </div>
                    <p class="text-sm text-right text-gray-700 dark:text-gray-300">
                        {{ $historia->paciente->infoLaboralActual->factores_de_riesgo_para_el_cargo ?? 'No especificado' }}
                    </p>
                </div>

                {{-- Card exposicion_a_factores_de_riesgo --}}
                <div class="p-4 bg-gray-50 dark:bg-zinc-700 rounded-lg shadow-sm">
                    <div class="flex items-center mb-2">
                        <x-icon name="exclamation-triangle" class="w-5 h-5 text-purple-500" />
                        <span class="ml-2 font-semibold text-gray-900 dark:text-white">Exposición a Factores de
                            Riesgo</span>
                    </div>
                    <p class="text-sm text-right text-gray-700 dark:text-gray-300">
                        {{ $historia->paciente->infoLaboralActual->exposicion_a_factores_de_riesgo ?? 'No especificado' }}
                    </p>
                </div>

                {{-- Card tipo factor de riesgo id --}}
                <div class="p-4 bg-gray-50 dark:bg-zinc-700 rounded-lg shadow-sm">
                    <div class="flex items-center mb-2">
                        <x-icon name="exclamation-triangle" class="w-5 h-5 text-purple-500" />
                        <span class="ml-2 font-semibold text-gray-900 dark:text-white">Tipo de Factor de Riesgo</span>
                    </div>
                    <p class="text-sm text-right text-gray-700 dark:text-gray-300">
                        {{ $historia->paciente->infoLaboralActual->tipo_factor_de_riesgo_id ?? 'No especificado' }}
                    </p>
                </div>
            </div>
            {{-- Separador --}}
            <hr class="my-6 border-gray-300 dark:border-zinc-600">

            {{-- Sección EPP --}}

            <div class="mt-6">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Uso de EPP</h3>
                @if (is_array($historia->paciente->infoLaboralActual->uso_de_epp))
                    <div class="flex flex-wrap gap-2">
                        @foreach ($historia->paciente->infoLaboralActual->uso_de_epp as $epp => $valor)
                            @if ($valor)
                                <span
                                    class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full dark:bg-green-900 dark:text-green-300">
                                    {{ ucfirst(str_replace('_', ' ', $epp)) }}
                                </span>
                            @endif
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-700 dark:text-gray-300">No especificado</p>
                @endif
            </div>
        </div>

        {{-- boton regresar --}}
        <div class="mt-6 flex justify-between">
            <x-action-button variant="warning" label="Actualizar Información Laboral" />
            <x-action-button href="{{ route('historias-clinicas.create', [
                        'paciente' => $historia->paciente->id,
                        'cita' => $historia->cita->id,
                    ]) }}" variant="success" label="Regresar" />
        </div>

    </x-slot>


    {{-- Metadatos --}}
    <x-slot name="footer">
        <p class="text text-center">
            <strong>Última actualización en la DDBB:</strong>
            {{ Carbon::parse($historia->paciente->infoLaboralActual->updated_at)->format('d/m/Y H:i') }}
            <strong>Usuario:</strong> {{ $historia->user->nombres }} {{ $historia->user->apellidos }}
        </p>
    </x-slot>
</div>
