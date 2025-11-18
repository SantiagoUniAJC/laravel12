<?php

use App\Models\HistoriaClinica;
use App\Models\HC\AntecedentePersonal;
use Livewire\Volt\Component;

new class extends Component {
    public HistoriaClinica $historia;
    public array $data = [];

    public function mount(HistoriaClinica $historia): void
    {
        $this->historia = $historia;
    }

    public function guardar()
    {
        $payload = $this->data;
        $payload['historia_clinica_id'] = $this->historia->id;
        $payload['paciente_id'] = $this->historia->paciente_id;

        try {
            $model = new AntecedentePersonal();
            if ($model->getFillable()) {
                AntecedentePersonal::create($payload);
            } else {
                $model->forceFill($payload)->save();
            }
        } catch (\Throwable $e) {
            report($e);
            return redirect(route('historias-clinicas.create', [$this->historia->paciente_id, $this->historia->cita_id]))->with('error', 'Error al crear Antecedente Personal');
        }

        return redirect(route('historias-clinicas.create', [$this->historia->paciente_id, $this->historia->cita_id]))->with('success', 'Antecedente Personal creado con éxito');
    }
}; ?>

<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">Crear Antecedente Personal: {{ $historia->paciente->nombreCompleto }}</h1>
        <flux:menu.separator />
    </x-slot>

    <div class="max-w-full mx-auto p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <form wire:submit.prevent='guardar' enctype="multipart/form-data">
            @csrf

            @php
                $model = new AntecedentePersonal();
                $fields = $model->getFillable() ?: ['descripcion'];
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-4">
                @foreach ($fields as $field)
                    @continue(in_array($field, ['paciente_id', 'historia_clinica_id']))
                    @php
                        $label = ucwords(str_replace(['_', '-'], [' ', ' '], $field));
                        $isText =
                            str_contains($field, 'descripcion') ||
                            str_contains($field, 'observacion') ||
                            str_contains($field, 'detalle') ||
                            str_contains($field, 'cuales_cirugias') ||
                            str_contains($field, 'otros');
                        $isDate = str_contains($field, 'fecha');
                    @endphp

                    @if ($isDate)
                        <div
                            class="p-2 bg-zinc-50 dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700 flex items-center space-x-2">
                            <input type="checkbox" id="{{ $field }}" wire:model="data.{{ $field }}"
                                class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500 dark:bg-zinc-700 dark:border-zinc-600">
                            <label for="{{ $field }}"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ $label }}</label>
                        </div>
                    @elseif ($isText)
                        <div class="col-span-1 sm:col-span-2 lg:col-span-6">
                            <label for="{{ $field }}"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">{{ $label }}</label>
                            <input type="text" id="{{ $field }}" wire:model="data.{{ $field }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-200">
                        </div>
                    @else
                        <div
                            class="p-2 bg-zinc-50 dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700 flex items-center space-x-2">
                            <input type="checkbox" id="{{ $field }}" wire:model="data.{{ $field }}"
                                class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500 dark:bg-zinc-700 dark:border-zinc-600">
                            <label for="{{ $field }}"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ $label }}</label>
                        </div>
                    @endif
                @endforeach
            </div>

            <flux:menu.separator />
            <div class="flex justify-center">
                <x-action-button class="mt-2" label="Guardar Antecedente Personal" variant="success" />
            </div>
        </form>
    </div>
</div>
