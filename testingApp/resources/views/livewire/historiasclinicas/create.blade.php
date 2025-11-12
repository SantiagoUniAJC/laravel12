<?php

use App\Models\Cita;
use App\Models\HistoriaClinica;
use App\Models\HC\MotivoConsulta;
use App\Models\Paciente;
use Livewire\Volt\Component;

new class extends Component {
    public Paciente $paciente;
    public HistoriaClinica $historiaClinica;

    public function mount(Paciente $paciente, Cita $cita): void
    {
        $this->paciente = $paciente;
        $this->cita = $cita;

        $this->historiaClinica = HistoriaClinica::firstOrCreate(
            ['paciente_id' => $paciente->id],
            [
                'user_id' => Auth::id(),
                'cita_id' => $cita->id,
                'estado' => 'activo',
            ],
        );
    }
}; ?>


<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
            {{ 'EVALUACIÓN MÉDICA OCUPACIONAL PACIENTE : ' }} {{ $paciente->nombres . ' ' . $paciente->apellidos }}

        </h1>
        <flux:menu.separator />
    </x-slot>

    <div class="grid grid-flow-col grid-rows-4 gap-4">
        {{--1 Informacion Laboral Actual --}}
        <div>
            <div class="bg-zinc-100 dark:bg-zinc-700 rounded-lg p-4 shadow hover:shadow-md transition space-y-3">
                <h3 class="text-zinc-800 dark:text-zinc-100 font-semibold text-lg">Información Laboral Actual</h3>

                @if (!empty($paciente->infoLaboralActual) && $paciente->infoLaboralActual !== null)
                    <div class="text-sm text-zinc-700 dark:text-zinc-300">
                        Actualmente este paciente tiene Información.  <a
                            href="{{ route('historias-clinicas.infolabactual.show', ['historia' => $historiaClinica->id]) }}"
                            class="text-blue-600 hover:underline">Puedes verla Aqui</a>
                    </div>
                @else
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">
                        <p>No hay información registrada.</p>
                        <div class="justify-self-end">
                            <a href="{{ route('historias-clinicas.infolabactual.create', ['historia' => $historiaClinica->id]) }}"
                                class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition ">
                                Crear Información
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{--Antecedentes Personales  --}}
        <div>
            <div class="bg-zinc-100 dark:bg-zinc-700 rounded-lg p-4 shadow hover:shadow-md transition space-y-3">
                <h3 class="text-zinc-800 dark:text-zinc-100 font-semibold text-lg">Antecedentes Personales</h3>
                @if (!empty($paciente->antecedentePersonal) && $paciente->antecedentePersonal !== null)
                    <div class="text-sm text-zinc-700 dark:text-zinc-300">
                        Actualmente este paciente tiene Información. Puedes <a
                            href="#"
                            class="text-blue-600 hover:underline">ver</a>
                        o <a href="#" class="text-blue-600 hover:underline">editar</a>
                    </div>
                @else
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">
                        <p>No hay información registrada.</p>
                        <div class="justify-self-end">
                            <a href="{{ route('historias-clinicas.antecedentePersonal.create', ['historia' => $historiaClinica->id]) }}"
                                class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition ">
                                Crear Información
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{--3 Examen Fisico --}}
        <div>            
            <div class="bg-zinc-100 dark:bg-zinc-700 rounded-lg p-4 shadow hover:shadow-md transition space-y-3">
                <h3 class="text-zinc-800 dark:text-zinc-100 font-semibold text-lg">Examen Fisico</h3>
                @if (!empty($paciente->examenFisico) && $paciente->examenFisico !== null)
                    <div class="text-sm text-zinc-700 dark:text-zinc-300">
                        Actualmente este paciente tiene Información. Puedes <a
                            href="{{ route('historias-clinicas.examenFisico', ['historia' => $historiaClinica->id]) }}"
                            class="text-blue-600 hover:underline">ver</a>
                        o <a href="#" class="text-blue-600 hover:underline">editar</a>
                    </div>
                @else
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">
                        <p>No hay información registrada.</p>
                        <div class="justify-self-end">
                            <a href="{{ route('historias-clinicas.examenFisico.create', ['historia' => $historiaClinica->id]) }}"
                                class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition ">
                                Crear Información
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{-- Diagnostico --}}
        <div>
            <div class="bg-zinc-100 dark:bg-zinc-700 rounded-lg p-4 shadow hover:shadow-md transition space-y-3">
                <h3 class="text-zinc-800 dark:text-zinc-100 font-semibold text-lg">Diagnostico</h3>
                @if (!empty($paciente->diagnostico) && $paciente->diagnostico !== null)
                    <div class="text-sm text-zinc-700 dark:text-zinc-300">
                        Actualmente este paciente tiene Información. Puedes <a
                            href="{{ route('historias-clinicas.diagnostico', ['historia' => $historiaClinica->id]) }}"
                            class="text-blue-600 hover:underline">ver</a>
                        o <a href="#" class="text-blue-600 hover:underline">editar</a>
                    </div>
                @else
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">
                        <p>No hay información registrada.</p>
                        <div class="justify-self-end">
                            <a href="{{ route('historias-clinicas.diagnostico.create', ['historia' => $historiaClinica->id]) }}"
                                class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition ">
                                Crear Información
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{--5 Motivo de Consulta --}}
        <div>
            <div class="bg-zinc-100 dark:bg-zinc-700 rounded-lg p-4 shadow hover:shadow-md transition space-y-3">
                <h3 class="text-zinc-800 dark:text-zinc-100 font-semibold text-lg">Motivo de Consulta</h3>

                @if (!empty($paciente->motivoConsulta) && $paciente->motivoConsulta !== null)
                    <div class="text-sm text-zinc-700 dark:text-zinc-300">
                        Actualmente este paciente tiene Información. Puedes <a
                            href="{{ route('historias-clinicas.motivoconsulta.show', ['historia' => $historiaClinica->id]) }}"
                            class="text-blue-600 hover:underline">ver</a>
                        o <a href="#" class="text-blue-600 hover:underline">editar</a>
                    </div>
                @else
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">
                        <p>No hay información registrada.</p>
                        <div class="justify-self-end">
                            <a href="{{ route('historias-clinicas.motivoconsulta.create', ['historia' => $historiaClinica->id]) }}"
                                class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition ">
                                Crear Información
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{-- Habitos Extralaborales --}}
        <div>
            <div class="bg-zinc-100 dark:bg-zinc-700 rounded-lg p-4 shadow hover:shadow-md transition space-y-3">
                <h3 class="text-zinc-800 dark:text-zinc-100 font-semibold text-lg">Habitos Extralaborales</h3>
                @if (!empty($paciente->HabitoExtralaboral) && $paciente->HabitoExtralaboral !== null)
                    <div class="text-sm text-zinc-700 dark:text-zinc-300">
                        Actualmente este paciente tiene Información. Puedes <a
                            href="{{ route('historias-clinicas.habitoExtralaboral', ['historia' => $historiaClinica->id]) }}"
                            class="text-blue-600 hover:underline">ver</a>
                        o <a href="#" class="text-blue-600 hover:underline">editar</a>
                    </div>
                @else
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">
                        <p>No hay información registrada.</p>
                        <div class="justify-self-end">
                            <a href="{{ route('historias-clinicas.habitoExtralaboral.create', ['historia' => $historiaClinica->id]) }}"
                                class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition ">
                                Crear Información
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{-- Pruebas Neurologicas --}}
        <div>
            <div class="bg-zinc-100 dark:bg-zinc-700 rounded-lg p-4 shadow hover:shadow-md transition space-y-3">
                <h3 class="text-zinc-800 dark:text-zinc-100 font-semibold text-lg">Pruebas Neurologicas</h3>
                @if (!empty($paciente->pruebasNeurologicas) && $paciente->pruebasNeurologicas !== null)
                    <div class="text-sm text-zinc-700 dark:text-zinc-300">
                        Actualmente este paciente tiene Información. Puedes <a
                            href="{{ route('historias-clinicas.pruebasNeurologicas', ['historia' => $historiaClinica->id]) }}"
                            class="text-blue-600 hover:underline">ver</a>
                        o <a href="#" class="text-blue-600 hover:underline">editar</a>
                    </div>
                @else
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">
                        <p>No hay información registrada.</p>
                        <div class="justify-self-end">
                            <a href="{{ route('historias-clinicas.pruebasNeurologicas.create', ['historia' => $historiaClinica->id]) }}"
                                class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition ">
                                Crear Información
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{-- Sistema de Vigilancia Epidemiologica --}}
        <div>
            <div class="bg-zinc-100 dark:bg-zinc-700 rounded-lg p-4 shadow hover:shadow-md transition space-y-3">
                <h3 class="text-zinc-800 dark:text-zinc-100 font-semibold text-lg">Sistema Vigilancia Epidemiologica
                </h3>
                @if (!empty($paciente->SistemaVigilanciaEpidemiologica) && $paciente->SistemaVigilanciaEpidemiologica !== null)
                    <div class="text-sm text-zinc-700 dark:text-zinc-300">
                        Actualmente este paciente tiene Información. Puedes <a
                            href="{{ route('historias-clinicas.sistemaVigilancia', ['historia' => $historiaClinica->id]) }}"
                            class="text-blue-600 hover:underline">ver</a>
                        o <a href="#" class="text-blue-600 hover:underline">editar</a>
                    </div>
                @else
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">
                        <p>No hay información registrada.</p>
                        <div class="justify-self-end">
                            <a href="{{ route('historias-clinicas.sistemaVigilancia.create', ['historia' => $historiaClinica->id]) }}"
                                class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition ">
                                Crear Información
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{-- Antecedentes Familiares --}}
        <div>
            <div class="bg-zinc-100 dark:bg-zinc-700 rounded-lg p-4 shadow hover:shadow-md transition space-y-3">
                <h3 class="text-zinc-800 dark:text-zinc-100 font-semibold text-lg">Antecedentes Familiares</h3>
                @if (!empty($paciente->antecedenteFamiliar) && $paciente->antecedenteFamiliar !== null)
                    <div class="text-sm text-zinc-700 dark:text-zinc-300">
                        Actualmente este paciente tiene Información. Puedes <a
                            href="{{ route('historias-clinicas.antecedenteFamiliar', ['historia' => $historiaClinica->id]) }}"
                            class="text-blue-600 hover:underline">ver</a>
                        o <a href="#" class="text-blue-600 hover:underline">editar</a>
                    </div>
                @else
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">
                        <p>No hay información registrada.</p>
                        <div class="justify-self-end">
                            <a href="{{ route('historias-clinicas.antecedenteFamiliar.create', ['historia' => $historiaClinica->id]) }}"
                                class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition ">
                                Crear Información
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{-- Revisión por Sistemas --}}
        <div>
            <div class="bg-zinc-100 dark:bg-zinc-700 rounded-lg p-4 shadow hover:shadow-md transition space-y-3">
                <h3 class="text-zinc-800 dark:text-zinc-100 font-semibold text-lg">Revisión por Sistemas</h3>
                @if (!empty($paciente->revisionLaboratorio) && $paciente->revisionLaboratorio !== null)
                    <div class="text-sm text-zinc-700 dark:text-zinc-300">
                        Actualmente este paciente tiene Información. Puedes <a
                            href="{{ route('historias-clinicas.revisionLaboratorio', ['historia' => $historiaClinica->id]) }}"
                            class="text-blue-600 hover:underline">ver</a>
                        o <a href="#" class="text-blue-600 hover:underline">editar</a>
                    </div>
                @else
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">
                        <p>No hay información registrada.</p>
                        <div class="justify-self-end">
                            <a href="{{ route('historias-clinicas.revisionLaboratorio.create', ['historia' => $historiaClinica->id]) }}"
                                class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition ">
                                Crear Información
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{-- Examenes Complementarios --}}
        <div>
            <div class="bg-zinc-100 dark:bg-zinc-700 rounded-lg p-4 shadow hover:shadow-md transition space-y-3">
                <h3 class="text-zinc-800 dark:text-zinc-100 font-semibold text-lg">Examenes Complementarios</h3>
                @if (!empty($paciente->examenComplementario) && $paciente->examenComplementario !== null)
                    <div class="text-sm text-zinc-700 dark:text-zinc-300">
                        Actualmente este paciente tiene Información. Puedes <a
                            href="{{ route('historias-clinicas.examenComplementario', ['historia' => $historiaClinica->id]) }}"
                            class="text-blue-600 hover:underline">ver</a>
                        o <a href="#" class="text-blue-600 hover:underline">editar</a>
                    </div>
                @else
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">
                        <p>No hay información registrada.</p>
                        <div class="justify-self-end">
                            <a href="{{ route('historias-clinicas.examenComplementario.create', ['historia' => $historiaClinica->id]) }}"
                                class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition ">
                                Crear Información
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{-- Recomendaciones Medicas --}}
        <div>
            <div class="bg-zinc-100 dark:bg-zinc-700 rounded-lg p-4 shadow hover:shadow-md transition space-y-3">
                <h3 class="text-zinc-800 dark:text-zinc-100 font-semibold text-lg">Recomendaciones Medicas</h3>
                @if (!empty($paciente->RecomendacionMedica) && $paciente->RecomendacionMedica !== null)
                    <div class="text-sm text-zinc-700 dark:text-zinc-300">
                        Actualmente este paciente tiene Información. Puedes <a
                            href="{{ route('historias-clinicas.recomendaciones-medicas', ['historia' => $historiaClinica->id]) }}"
                            class="text-blue-600 hover:underline">ver</a>
                        o <a href="#" class="text-blue-600 hover:underline">editar</a>
                    </div>
                @else
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">
                        <p>No hay información registrada.</p>
                        <div class="justify-self-end">
                            <a href="{{ route('historias-clinicas.recomendacionesMedicas.create', ['historia' => $historiaClinica->id]) }}"
                                class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition ">
                                Crear Información
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
