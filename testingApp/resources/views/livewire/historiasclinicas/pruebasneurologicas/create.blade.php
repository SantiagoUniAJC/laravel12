<?php

use App\Models\HistoriaClinica;
use App\Models\HC\PruebaNeurologica;
use Livewire\Volt\Component;

new class extends Component {
    public HistoriaClinica $historia;
    public array $data = [];

    public function mount(HistoriaClinica $historia): void
    {
        $this->historia = $historia;
    }

    public function guardar(): \Illuminate\Http\RedirectResponse
    {
        $payload = $this->data;
        $payload['historia_clinica_id'] = $this->historia->id;
        $payload['paciente_id'] = $this->historia->paciente_id;

        try {
            $model = new PruebaNeurologica();
            if ($model->getFillable()) {
                PruebaNeurologica::create($payload);
            } else {
                $model->forceFill($payload)->save();
            }
        } catch (\Throwable $e) {
            report($e);
            return redirect(route('historias-clinicas.create', [$this->historia->paciente_id, $this->historia->cita_id]))->with('error', 'Error al crear Prueba Neurológica');
        }

        return redirect(route('historias-clinicas.create', [$this->historia->paciente_id, $this->historia->cita_id]))->with('success', 'Prueba Neurológica creada con éxito');
    }
}; ?>

<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">Crear Prueba Neurológica</h1>
        <flux:menu.separator />
    </x-slot>

    <div class="max-w-full mx-auto p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <form wire:submit.prevent='guardar' enctype="multipart/form-data">
            @csrf

            @php
                $model = new PruebaNeurologica();
                $fields = $model->getFillable() ?: ['descripcion'];
            @endphp

            <div class="grid grid-cols-1 gap-4">
                @foreach($fields as $field)
                    @php $label = ucwords(str_replace(['_','-'], [' ',' '], $field)); @endphp
                    <x-textarea-field name="{{ $field }}" label="{{ $label }}" model="data.{{ $field }}" />
                @endforeach
            </div>

            <flux:menu.separator />
            <div class="flex justify-center">
                <x-action-button class="mt-2" label="Guardar Prueba Neurológica" variant="success" />
            </div>
        </form>
    </div>
</div>
